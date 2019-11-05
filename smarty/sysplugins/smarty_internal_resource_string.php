<?php
/**
 * smarty Internal Plugin Resource String
 *
 * @package smarty
 * @subpackage TemplateResources
 * @author Uwe Tews
 * @author Rodney Rehm
 */

/**
 * smarty Internal Plugin Resource String
 *
 * Implements the strings as resource for smarty template
 *
 * {@internal unlike eval-resources the compiled state of string-resources is saved for subsequent access}}
 *
 * @package smarty
 * @subpackage TemplateResources
 */
class smarty_Internal_Resource_String extends smarty_Resource {

    /**
     * populate Source Object with meta data from Resource
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     * @return void
     */
    public function populate(smarty_Template_Source $source, smarty_Internal_Template $_template=null)
    {
        $source->uid = $source->filepath = sha1($source->name);
        $source->timestamp = 0;
        $source->exists = true;
    }

    /**
     * Load template's source from $resource_name into current template object
     *
     * @uses decode() to decode base64 and urlencoded template_resources
     * @param smarty_Template_Source $source source object
     * @return string template source
     */
    public function getContent(smarty_Template_Source $source)
    {
        return $this->decode($source->name);
    }
    
    /**
     * decode base64 and urlencode
     *
     * @param string $string template_resource to decode
     * @return string decoded template_resource
     */
    protected function decode($string)
    {
        // decode if specified
        if (($pos = strpos($string, ':')) !== false) {
            if (!strncmp($string, 'base64', 6)) {
                return base64_decode(substr($string, 7));
            } elseif (!strncmp($string, 'urlencode', 9)) {
                return urldecode(substr($string, 10));
            }
        }
        
        return $string;
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
        return get_class($this) . '#' .$this->decode($resource_name);
    }

    /**
     * Determine basename for compiled filename
     *
     * Always returns an empty string.
     *
     * @param smarty_Template_Source $source source object
     * @return string resource's basename
     */
    protected function getBasename(smarty_Template_Source $source)
    {
        return '';
    }

}

?>