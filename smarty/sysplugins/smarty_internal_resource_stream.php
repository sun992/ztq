<?php
/**
 * smarty Internal Plugin Resource Stream
 *
 * Implements the streams as resource for smarty template
 *
 * @package smarty
 * @subpackage TemplateResources
 * @author Uwe Tews
 * @author Rodney Rehm
 */

/**
 * smarty Internal Plugin Resource Stream
 *
 * Implements the streams as resource for smarty template
 *
 * @link http://php.net/streams
 * @package smarty
 * @subpackage TemplateResources
 */
class smarty_Internal_Resource_Stream extends smarty_Resource_Recompiled {

    /**
     * populate Source Object with meta data from Resource
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     * @return void
     */
    public function populate(smarty_Template_Source $source, smarty_Internal_Template $_template=null)
    {
        $source->filepath = str_replace(':', '://', $source->resource);
        $source->uid = false;
        $source->content = $this->getContent($source);
        $source->timestamp = false;
        $source->exists = !!$source->content;
    }

    /**
     * Load template's source from stream into current template object
     *
     * @param smarty_Template_Source $source source object
     * @return string template source
     * @throws smartyException if source cannot be loaded
     */
    public function getContent(smarty_Template_Source $source)
    {
        $t = '';
        // the availability of the stream has already been checked in smarty_Resource::fetch()
        $fp = fopen($source->filepath, 'r+');
        if ($fp) {
            while (!feof($fp) && ($current_line = fgets($fp)) !== false) {
                $t .= $current_line;
            }
            fclose($fp);
            return $t;
        } else {
            return false;
        }
    }
    
    /**
     * modify resource_name according to resource handlers specifications
     *
     * @param smarty $smarty        smarty instance
     * @param string $resource_name resource_name to make unique
     * @return string unique resource name
     */
    protected function buildUniqueResourceName(smarty $smarty, $resource_name)
    {
        return get_class($this) . '#' . $resource_name;
    }
}

?>