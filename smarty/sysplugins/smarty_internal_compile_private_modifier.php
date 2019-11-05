<?php

/**
 * smarty Internal Plugin Compile Modifier
 *
 * Compiles code for modifier execution
 *
 * @package smarty
 * @subpackage Compiler
 * @author Uwe Tews
 */

/**
 * smarty Internal Plugin Compile Modifier class
 *
 * @package smarty
 * @subpackage Compiler
 */
class smarty_Internal_Compile_Private_Modifier extends smarty_Internal_CompileBase {

    /**
     * Compiles code for modifier execution
     *
     * @param array  $args      array with attributes from parser
     * @param object $compiler  compiler object
     * @param array  $parameter array with compilation parameter
     * @return string compiled code
     */
    public function compile($args, $compiler, $parameter)
    {
        // check and get attributes
        $_attr = $this->getattributes($compiler, $args);
        $output = $parameter['value'];
        // loop over list of modifiers
        foreach ($parameter['modifierlist'] as $single_modifier) {
            $modifier = $single_modifier[0];
            $single_modifier[0] = $output;
            $params = implode(',', $single_modifier);
            // check for registered modifier
            if (isset($compiler->smarty->registered_plugins[smarty::PLUGIN_MODIFIER][$modifier])) {
                $function = $compiler->smarty->registered_plugins[smarty::PLUGIN_MODIFIER][$modifier][0];
                if (!is_array($function)) {
                    $output = "{$function}({$params})";
                } else {
                    if (is_object($function[0])) {
                        $output = '$_smarty_tpl->smarty->registered_plugins[smarty::PLUGIN_MODIFIER][\'' . $modifier . '\'][0][0]->' . $function[1] . '(' . $params . ')';
                    } else {
                        $output = $function[0] . '::' . $function[1] . '(' . $params . ')';
                    }
                }
            } else if (isset($compiler->smarty->registered_plugins[smarty::PLUGIN_MODIFIERCOMPILER][$modifier][0])) {
                $output = call_user_func($compiler->smarty->registered_plugins[smarty::PLUGIN_MODIFIERCOMPILER][$modifier][0], $single_modifier, $compiler->smarty);
                // check for plugin modifiercompiler
            } else if ($compiler->smarty->loadPlugin('smarty_modifiercompiler_' . $modifier)) {
                // check if modifier allowed
                if (!is_object($compiler->smarty->security_policy) || $compiler->smarty->security_policy->isTrustedModifier($modifier, $compiler)) {
                    $plugin = 'smarty_modifiercompiler_' . $modifier;
                    $output = $plugin($single_modifier, $compiler);
                }
                // check for plugin modifier
            } else if ($function = $compiler->getplugin($modifier, smarty::PLUGIN_MODIFIER)) {
                // check if modifier allowed
                if (!is_object($compiler->smarty->security_policy) || $compiler->smarty->security_policy->isTrustedModifier($modifier, $compiler)) {
                    $output = "{$function}({$params})";
                }
                // check if trusted PHP function
            } else if (is_callable($modifier)) {
                // check if modifier allowed
                if (!is_object($compiler->smarty->security_policy) || $compiler->smarty->security_policy->isTrustedPhpModifier($modifier, $compiler)) {
                    $output = "{$modifier}({$params})";
                }
            } else {
                $compiler->trigger_template_error("unknown modifier \"" . $modifier . "\"", $compiler->lex->taglineno);
            }
        }
        return $output;
    }

}

?>