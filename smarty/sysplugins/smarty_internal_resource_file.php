<?php
/**
 * smarty Internal Plugin Resource File
 *
 * @package smarty
 * @subpackage TemplateResources
 * @author Uwe Tews
 * @author Rodney Rehm
 */

/**
 * smarty Internal Plugin Resource File
 *
 * Implements the file system as resource for smarty templates
 *
 * @package smarty
 * @subpackage TemplateResources
 */
class smarty_Internal_Resource_File extends smarty_Resource {

    /**
     * populate Source Object with meta data from Resource
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     */
    public function populate(smarty_Template_Source $source, smarty_Internal_Template $_template=null)
    {
        $source->filepath = $this->buildFilepath($source, $_template);

        if ($source->filepath !== false) {
            if (is_object($source->smarty->security_policy)) {
                $source->smarty->security_policy->isTrustedResourceDir($source->filepath);
            }

            $source->uid = sha1($source->filepath);
            if ($source->smarty->compile_check && !isset($source->timestamp)) {
                $source->timestamp = @filemtime($source->filepath);
                $source->exists = !!$source->timestamp;
            }
        }
    }

    /**
     * populate Source Object with timestamp and exists from Resource
     *
     * @param smarty_Template_Source $source source object
     */
    public function populateTimestamp(smarty_Template_Source $source)
    {
        $source->timestamp = @filemtime($source->filepath);
        $source->exists = !!$source->timestamp;
    }

    /**
     * Load template's source from file into current template object
     *
     * @param smarty_Template_Source $source source object
     * @return string template source
     * @throws smartyException if source cannot be loaded
     */
    public function getContent(smarty_Template_Source $source)
    {
        if ($source->timestamp) {
            return file_get_contents($source->filepath);
        }
        if ($source instanceof smarty_Config_Source) {
            throw new smartyException("Unable to read config {$source->type} '{$source->name}'");
        }
        throw new smartyException("Unable to read template {$source->type} '{$source->name}'");
    }

    /**
     * Determine basename for compiled filename
     *
     * @param smarty_Template_Source $source source object
     * @return string resource's basename
     */
    public function getBasename(smarty_Template_Source $source)
    {
        $_file = $source->name;
        if (($_pos = strpos($_file, ']')) !== false) {
            $_file = substr($_file, $_pos + 1);
        }
        return basename($_file);
    }

}

?>