<?php
/**
 * smarty Internal Plugin Compile Rdelim
 *
 * Compiles the {rdelim} tag
 * @package smarty
 * @subpackage Compiler
 * @author Uwe Tews
 */

/**
 * smarty Internal Plugin Compile Rdelim class
 *
 * @package smarty
 * @subpackage Compiler
 */
class smarty_Internal_Compile_Rdelim extends smarty_Internal_CompileBase {

    /**
     * Compiles code for the {rdelim} tag
     *
     * This tag does output the right delimiter.
     *
     * @param array  $args     array with attributes from parser
     * @param object $compiler compiler object
     * @return string compiled code
     */
    public function compile($args, $compiler)
    {
        $_attr = $this->getattributes($compiler, $args);
        if ($_attr['nocache'] === true) {
            $compiler->trigger_template_error('nocache option not allowed', $compiler->lex->taglineno);
        }
        // this tag does not return compiled code
        $compiler->has_code = true;
        return $compiler->smarty->right_delimiter;
    }

}

?>