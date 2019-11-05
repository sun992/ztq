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
 * Base implementation for resource plugins that don't use the compiler
 *
 * @package smarty
 * @subpackage TemplateResources
 */
abstract class smarty_Resource_Uncompiled extends smarty_Resource {

    /**
     * Render and output the template (without using the compiler)
     *
     * @param smarty_Template_Source   $source    source object
     * @param smarty_Internal_Template $_template template object
     * @throws smartyException on failure
     */
    public abstract function renderUncompiled(smarty_Template_Source $source, smarty_Internal_Template $_template);

    /**
     * populate compiled object with compiled filepath
     *
     * @param smarty_Template_Compiled $compiled  compiled object
     * @param smarty_Internal_Template $_template template object (is ignored)
     */
    public function populateCompiledFilepath(smarty_Template_Compiled $compiled, smarty_Internal_Template $_template)
    {
        $compiled->filepath = false;
        $compiled->timestamp = false;
        $compiled->exists = false;
    }

}

?>