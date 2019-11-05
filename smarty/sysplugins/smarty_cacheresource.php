<?php
/**
* smarty Internal Plugin
*
* @package smarty
* @subpackage Cacher
*/

/**
* Cache Handler API
*
* @package smarty
* @subpackage Cacher
* @author Rodney Rehm
*/
abstract class smarty_CacheResource {
    /**
    * cache for smarty_CacheResource instances
    * @var array
    */
    public static $resources = array();

    /**
    * resource types provided by the core
    * @var array
    */
    protected static $sysplugins = array(
        'file' => true,
    );

    /**
    * populate Cached Object with meta data from Resource
    *
    * @param smarty_Template_Cached $cached cached object
    * @param smarty_Internal_Template $_template template object
    * @return void
    */
    public abstract function populate(smarty_Template_Cached $cached, smarty_Internal_Template $_template);

    /**
    * populate Cached Object with timestamp and exists from Resource
    *
    * @param smarty_Template_Cached $source cached object
    * @return void
    */
    public abstract function populateTimestamp(smarty_Template_Cached $cached);

    /**
    * Read the cached template and process header
    *
    * @param smarty_Internal_Template $_template template object
    * @param smarty_Template_Cached $cached cached object
    * @return booelan true or false if the cached content does not exist
    */
    public abstract function process(smarty_Internal_Template $_template, smarty_Template_Cached $cached=null);

    /**
    * Write the rendered template output to cache
    *
    * @param smarty_Internal_Template $_template template object
    * @param string $content content to cache
    * @return boolean success
    */
    public abstract function writeCachedContent(smarty_Internal_Template $_template, $content);

    /**
    * Return cached content
    *
    * @param smarty_Internal_Template $_template template object
    * @param string $content content of cache
    */
    public function getCachedContent(smarty_Internal_Template $_template)
    {
        if ($_template->cached->handler->process($_template)) {
            ob_start();
            $_template->properties['unifunc']($_template);
            return ob_get_clean();
        }
        return null;
    }

    /**
    * Empty cache
    *
    * @param smarty $smarty smarty object
    * @param integer $exp_time expiration time (number of seconds, not timestamp)
    * @return integer number of cache files deleted
    */
    public abstract function clearAll(smarty $smarty, $exp_time=null);

    /**
    * Empty cache for a specific template
    *
    * @param smarty $smarty smarty object
    * @param string $resource_name template name
    * @param string $cache_id cache id
    * @param string $compile_id compile id
    * @param integer $exp_time expiration time (number of seconds, not timestamp)
    * @return integer number of cache files deleted
    */
    public abstract function clear(smarty $smarty, $resource_name, $cache_id, $compile_id, $exp_time);


    public function locked(smarty $smarty, smarty_Template_Cached $cached)
    {
        // theoretically locking_timeout should be checked against time_limit (max_execution_time)
        $start = microtime(true);
        $hadLock = null;
        while ($this->hasLock($smarty, $cached)) {
            $hadLock = true;
            if (microtime(true) - $start > $smarty->locking_timeout) {
                // abort waiting for lock release
                return false;
            }
            sleep(1);
        }
        return $hadLock;
    }

    public function hasLock(smarty $smarty, smarty_Template_Cached $cached)
    {
        // check if lock exists
        return false;
    }

    public function acquireLock(smarty $smarty, smarty_Template_Cached $cached)
    {
        // create lock
        return true;
    }

    public function releaseLock(smarty $smarty, smarty_Template_Cached $cached)
    {
        // release lock
        return true;
    }


    /**
    * Load Cache Resource Handler
    *
    * @param smarty $smarty smarty object
    * @param string $type name of the cache resource
    * @return smarty_CacheResource Cache Resource Handler
    */
    public static function load(smarty $smarty, $type = null)
    {
        if (!isset($type)) {
            $type = $smarty->caching_type;
        }

        // try smarty's cache
        if (isset($smarty->_cacheresource_handlers[$type])) {
            return $smarty->_cacheresource_handlers[$type];
        }
        
        // try registered resource
        if (isset($smarty->registered_cache_resources[$type])) {
            // do not cache these instances as they may vary from instance to instance
            return $smarty->_cacheresource_handlers[$type] = $smarty->registered_cache_resources[$type];
        }
        // try sysplugins dir
        if (isset(self::$sysplugins[$type])) {
            if (!isset(self::$resources[$type])) {
                $cache_resource_class = 'smarty_Internal_CacheResource_' . ucfirst($type);
                self::$resources[$type] = new $cache_resource_class();
            }
            return $smarty->_cacheresource_handlers[$type] = self::$resources[$type];
        }
        // try plugins dir
        $cache_resource_class = 'smarty_CacheResource_' . ucfirst($type);
        if ($smarty->loadPlugin($cache_resource_class)) {
            if (!isset(self::$resources[$type])) {
                self::$resources[$type] = new $cache_resource_class();
            }
            return $smarty->_cacheresource_handlers[$type] = self::$resources[$type];
        }
        // give up
        throw new smartyException("Unable to load cache resource '{$type}'");
    }

    /**
    * Invalid Loaded Cache Files
    *
    * @param smarty $smarty smarty object
    */
    public static function invalidLoadedCache(smarty $smarty)
    {
        foreach ($smarty->template_objects as $tpl) {
            if (isset($tpl->cached)) {
                $tpl->cached->valid = false;
                $tpl->cached->processed = false;
            }
        }
    }
}

/**
* smarty Resource Data Object
*
* Cache Data Container for Template Files
*
* @package smarty
* @subpackage TemplateResources
* @author Rodney Rehm
*/
class smarty_Template_Cached {
    /**
    * Source Filepath
    * @var string
    */
    public $filepath = false;

    /**
    * Source Content
    * @var string
    */
    public $content = null;

    /**
    * Source Timestamp
    * @var integer
    */
    public $timestamp = false;

    /**
    * Source Existance
    * @var boolean
    */
    public $exists = false;

    /**
    * Cache Is Valid
    * @var boolean
    */
    public $valid = false;

    /**
    * Cache was processed
    * @var boolean
    */
    public $processed = false;

    /**
    * CacheResource Handler
    * @var smarty_CacheResource
    */
    public $handler = null;

    /**
    * Template Compile Id (smarty_Internal_Template::$compile_id)
    * @var string
    */
    public $compile_id = null;

    /**
    * Template Cache Id (smarty_Internal_Template::$cache_id)
    * @var string
    */
    public $cache_id = null;

    /**
    * Id for cache locking
    * @var string
    */
    public $lock_id = null;

    /**
    * flag that cache is locked by this instance
    * @var bool
    */
    public $is_locked = false;

    /**
    * Source Object
    * @var smarty_Template_Source
    */
    public $source = null;

    /**
    * create Cached Object container
    *
    * @param smarty_Internal_Template $_template template object
    */
    public function __construct(smarty_Internal_Template $_template)
    {
        $this->compile_id = $_template->compile_id;
        $this->cache_id = $_template->cache_id;
        $this->source = $_template->source;
        $_template->cached = $this;
        $smarty = $_template->smarty;

        //
        // load resource handler
        //
        $this->handler = $handler = smarty_CacheResource::load($smarty); // Note: prone to circular references

        //
        //    check if cache is valid
        //
        if (!($_template->caching == smarty::CACHING_LIFETIME_CURRENT || $_template->caching == smarty::CACHING_LIFETIME_SAVED) || $_template->source->recompiled) {
            $handler->populate($this, $_template);
            return;
        }
        while (true) {
            while (true) {
                $handler->populate($this, $_template);
                if ($this->timestamp === false || $smarty->force_compile || $smarty->force_cache) {
                    $this->valid = false;
                } else {
                    $this->valid = true;
                }
                if ($this->valid && $_template->caching == smarty::CACHING_LIFETIME_CURRENT && $_template->cache_lifetime >= 0 && time() > ($this->timestamp + $_template->cache_lifetime)) {
                    // lifetime expired
                    $this->valid = false;
                }
                if ($this->valid || !$_template->smarty->cache_locking) {
                    break;
                }
                if (!$this->handler->locked($_template->smarty, $this)) {
                    $this->handler->acquireLock($_template->smarty, $this);
                    break 2;
                }
            }
            if ($this->valid) {
                if (!$_template->smarty->cache_locking || $this->handler->locked($_template->smarty, $this) === null) {
                    // load cache file for the following checks
                    if ($smarty->debugging) {
                        smarty_Internal_Debug::start_cache($_template);
                    }
                    if($handler->process($_template, $this) === false) {
                        $this->valid = false;
                    } else {
                        $this->processed = true;
                    }
                    if ($smarty->debugging) {
                        smarty_Internal_Debug::end_cache($_template);
                    }
                } else {
                    continue;
                }
            } else {
                return;
            }
            if ($this->valid && $_template->caching === smarty::CACHING_LIFETIME_SAVED && $_template->properties['cache_lifetime'] >= 0 && (time() > ($_template->cached->timestamp + $_template->properties['cache_lifetime']))) {
                $this->valid = false;
            }
            if (!$this->valid && $_template->smarty->cache_locking) {
                $this->handler->acquireLock($_template->smarty, $this);
                return;
            } else {
                return;
            }
        }
    }

    /**
    * Write this cache object to handler
    *
    * @param smarty_Internal_Template $_template template object
    * @param string $content content to cache
    * @return boolean success
    */
    public function write(smarty_Internal_Template $_template, $content)
    {
        if (!$_template->source->recompiled) {
            if ($this->handler->writeCachedContent($_template, $content)) {
                $this->timestamp = time();
                $this->exists = true;
                $this->valid = true;
                if ($_template->smarty->cache_locking) {
                    $this->handler->releaseLock($_template->smarty, $this);
                }
                return true;
            }
        }
        return false;
    }

}
?>