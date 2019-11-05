<?php
/**
 * smarty Resource Plugin
 *
 * @package smarty
 * @subpackage TemplateResources
 * @author Rodney Rehm
 */

/**
 * smarty Resource Plugin
 *
 * Wrapper Implementation for custom resource plugins
 *
 * @package smarty
 * @subpackage TemplateResources
 */
abstract class smarty_Resource_Custom extends smarty_Resource {

    /**
     * fetch template and its modification time from data source
     *
     * @param string  $name    template name
     * @param string  &$source template source
     * @param integer &$mtime  template modification timestamp (epoch)
     */
    protected abstract function fetch($name, &$source, &$mtime);

    /**
     * Fetch template's modification timestamp from data source
     *
     * {@internal implementing this method is optional.
     *  Only implement it if modification times can be accessed faster than loading the complete template source.}}
     *
     * @param string $name template name
     * @return integer|boolean timestamp (epoch) the template was modified, or false if not found
     */
    protected function fetchTimestamp($name)
    {
        return null;
    }

    /**
     * populate Source Object with meta data from Resource
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     */
    public function populate(smarty_Template_Source $source, smarty_Internal_Template $_template=null)
    {
        $source->filepath = strtolower($source->type . ':' . $source->name);
        $source->uid = sha1($source->type . ':' . $source->name);

        $mtime = $this->fetchTimestamp($source->name);
        if ($mtime !== null) {
            $source->timestamp = $mtime;
        } else {
            $this->fetch($source->name, $content, $timestamp);
            $source->timestamp = isset($timestamp) ? $timestamp : false;
            if( isset($content) )
                $source->content = $content;
        }
        $source->exists = !!$source->timestamp;
    }

    /**
     * Load template's source into current template object
     *
     * @param smarty_Template_Source $source source object
     * @return string template source
     * @throws smartyException if source cannot be loaded
     */
    public function getContent(smarty_Template_Source $source)
    {
        $this->fetch($source->name, $content, $timestamp);
        if (isset($content)) {
            return $content;
        }

        throw new smartyException("Unable to read template {$source->type} '{$source->name}'");
    }

    /**
     * Determine basename for compiled filename
     *
     * @param smarty_Template_Source $source source object
     * @return string resource's basename
     */
    protected function getBasename(smarty_Template_Source $source)
    {
        return basename($source->name);
    }

}

?>