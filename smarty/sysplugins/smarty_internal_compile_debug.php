<?php
/**
 * smarty Internal Plugin Compile Debug
 *
 * Compiles the {debug} tag.
 * It opens a window the the smarty Debugging Console.
 *
 * @package smarty
 * @subpackage Compiler
 * @author Uwe Tews
 */

/**
 * smarty Internal Plugin Compile Debug class
 *
 * @package smarty
 * @subpackage Compiler
 */
class smarty_Internal_Compile_Debug extends smarty_Internal_CompileBase {

    /**
     * Compiles code for the {debug} tag
     *
     * @param array  $args     array with attributes from parser
     * @param object $compiler compiler object
     * @return string compiled code
     */
    public function compile($args, $compiler)
    {
        // check and get attributes
        $_attr = $this->getattributes($compiler, $args);

        // compile always as nocache
        $compiler->tag_nocache = true;

        // display debug template
        $_output = "<?php \$_smarty_tpl->smarty->loadPlugin('smarty_Internal_Debug'); smarty_Internal_Debug::display_debug(\$_smarty_tpl); ?>";
        return $_output;
    }

}

?>