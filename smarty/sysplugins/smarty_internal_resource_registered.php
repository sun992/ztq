<?php
/**
 * smarty Internal Plugin Resource Registered
 *
 * @package smarty
 * @subpackage TemplateResources
 * @author Uwe Tews
 * @author Rodney Rehm
 */

/**
 * smarty Internal Plugin Resource Registered
 *
 * Implements the registered resource for smarty template
 *
 * @package smarty
 * @subpackage TemplateResources
 * @deprecated
 */
class smarty_Internal_Resource_Registered extends smarty_Resource {

    /**
     * populate Source Object with meta data from Resource
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     * @return void
     */
    public function populate(smarty_Template_Source $source, smarty_Internal_Template $_template=null)
    {
        $source->filepath = $source->type . ':' . $source->name;
        $source->uid = sha1($source->filepath);
        if ($source->smarty->compile_check) {
            $source->timestamp = $this->getTemplateTimestamp($source);
            $source->exists = !!$source->timestamp;
        }
    }

    /**
     * populate Source Object with timestamp and exists from Resource
     *
     * @param smarty_Template_Source $source source object
     * @return void
     */
    public function populateTimestamp(smarty_Template_Source $source)
    {
        $source->timestamp = $this->getTemplateTimestamp($source);
        $source->exists = !!$source->timestamp;
    }

    /**
     * Get timestamp (epoch) the template source was modified
     *
     * @param smarty_Template_Source $source source object
     * @return integer|boolean timestamp (epoch) the template was modified, false if resources has no timestamp
     */
    public function getTemplateTimestamp(smarty_Template_Source $source)
    {
        // return timestamp
        $time_stamp = false;
        call_user_func_array($source->smarty->registered_resources[$source->type][0][1], array($source->name, &$time_stamp, $source->smarty));
        return is_numeric($time_stamp) ? (int) $time_stamp : $time_stamp;
    }

    /**
     * Load template's source by invoking the registered callback into current template object
     *
     * @param smarty_Template_Source $source source object
     * @return string template source
     * @throws smartyException if source cannot be loaded
     */
    public function getContent(smarty_Template_Source $source)
    {
        // return template string
        $t = call_user_func_array($source->smarty->registered_resources[$source->type][0][0], array($source->name, &$source->content, $source->smarty));
        if (is_bool($t) && !$t) {
            throw new smartyException("Unable to read template {$source->type} '{$source->name}'");
        }
        return $source->content;
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