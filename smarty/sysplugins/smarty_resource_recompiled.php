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
 * Base implementation for resource plugins that don't compile cache
 *
 * @package smarty
 * @subpackage TemplateResources
 */
abstract class smarty_Resource_Recompiled extends smarty_Resource {

    /**
     * populate Compiled Object with compiled filepath
     *
     * @param smarty_Template_Compiled $compiled compiled object
     * @param smarty_Internal_Template $_template template object
     * @return void
     */
    public function populateCompiledFilepath(smarty_Template_Compiled $compiled, smarty_Internal_Template $_template)
    {
        $compiled->filepath = false;
        $compiled->timestamp = false;
        $compiled->exists = false;
    }

}

?>