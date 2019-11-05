<?php
/**
* smarty Internal Plugin Compile If
*
* Compiles the {if} {else} {elseif} {/if} tags
*
* @package smarty
* @subpackage Compiler
* @author Uwe Tews
*/

/**
* smarty Internal Plugin Compile If class
*
* @package smarty
* @subpackage Compiler
*/
class smarty_Internal_Compile_If extends smarty_Internal_CompileBase {

    /**
    * Compiles code for the {if} tag
    *
    * @param array  $args       array with attributes from parser
    * @param object $compiler   compiler object
    * @param array  $parameter  array with compilation parameter
    * @return string compiled code
    */
    public function compile($args, $compiler, $parameter)
    {
        // check and get attributes
        $_attr = $this->getattributes($compiler, $args);
        $this->openTag($compiler, 'if', array(1, $compiler->nocache));
        // must whole block be nocache ?
        $compiler->nocache = $compiler->nocache | $compiler->tag_nocache;

        if (!array_key_exists("if condition",$parameter)) {
            $compiler->trigger_template_error("missing if condition", $compiler->lex->taglineno);
        }

        if (is_array($parameter['if condition'])) {
            if ($compiler->nocache) {
                $_nocache = ',true';
                // create nocache var to make it know for further compiling
                if (is_array($parameter['if condition']['var'])) {
                    $compiler->template->tpl_vars[trim($parameter['if condition']['var']['var'], "'")] = new smarty_variable(null, true);
                } else {
                    $compiler->template->tpl_vars[trim($parameter['if condition']['var'], "'")] = new smarty_variable(null, true);
                }
            } else {
                $_nocache = '';
            }
            if (is_array($parameter['if condition']['var'])) {
                $_output = "<?php if (!isset(\$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']['var']."]) || !is_array(\$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']['var']."]->value)) \$_smarty_tpl->createLocalArrayVariable(".$parameter['if condition']['var']['var']."$_nocache);\n";
                $_output .= "if (\$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']['var']."]->value".$parameter['if condition']['var']['smarty_internal_index']." = ".$parameter['if condition']['value']."){?>";
            } else {
                $_output = "<?php if (!isset(\$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']."])) \$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']."] = new smarty_Variable(null{$_nocache});";
                $_output .= "if (\$_smarty_tpl->tpl_vars[".$parameter['if condition']['var']."]->value = ".$parameter['if condition']['value']."){?>";
            }
            return $_output;
        } else {
            return "<?php if ({$parameter['if condition']}){?>";
        }
    }

}

/**
* smarty Internal Plugin Compile Else class
*
* @package smarty
* @subpackage Compiler
*/
class smarty_Internal_Compile_Else extends smarty_Internal_CompileBase {

    /**
    * Compiles code for the {else} tag
    *
    * @param array  $args       array with attributes from parser
    * @param object $compiler   compiler object
    * @param array  $parameter  array with compilation parameter
    * @return string compiled code
    */
    public function compile($args, $compiler, $parameter)
    {
        list($nesting, $compiler->tag_nocache) = $this->closeTag($compiler, array('if', 'elseif'));
        $this->openTag($compiler, 'else', array($nesting, $compiler->tag_nocache));

        return "<?php }else{ ?>";
    }

}

/**
* smarty Internal Plugin Compile ElseIf class
*
* @package smarty
* @subpackage Compiler
*/
class smarty_Internal_Compile_Elseif extends smarty_Internal_CompileBase {

    /**
    * Compiles code for the {elseif} tag
    *
    * @param array  $args       array with attributes from parser
    * @param object $compiler   compiler object
    * @param array  $parameter  array with compilation parameter
    * @return string compiled code
    */
    public function compile($args, $compiler, $parameter)
    {
        // check and get attributes
        $_attr = $this->getattributes($compiler, $args);

        list($nesting, $compiler->tag_nocache) = $this->closeTag($compiler, array('if', 'elseif'));

        if (!array_key_exists("if condition",$parameter)) {
            $compiler->trigger_template_error("missing elseif condition", $compiler->lex->taglineno);
        }

        if (is_array($parameter['if condition'])) {
            $condition_by_assign = true;
            if ($compiler->nocache) {
                $_nocache = ',true';
                // create nocache var to make it know for further compiling
                if (is_array($parameter['if condition']['var'])) {
                    $compiler->template->tpl_vars[trim($parameter['if condition']['var']['var'], "'")] = new smarty_variable(null, true);
                } else {
                    $compiler->template->tpl_vars[trim($parameter['if condition']['var'], "'")] = new smarty_variable(null, true);
                }
            } else {
                $_nocache = '';
            }
        } else {
            $condition_by_assign = false;
        }

        if (empty($compiler->prefix_code)) {
            if ($condition_by_assign) {
                $this->openTag($compiler, 'elseif', array($nesting + 1, $compiler->tag_nocache));
                if (is_array($parameter['if condition']['var'])) {
                    $_output = "<?php }else{ if (!isset(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]) || !is_array(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]->value)) \$_smarty_tpl->createLocalArrayVariable(" . $parameter['if condition']['var']['var'] . "$_nocache);\n";
                    $_output .= "if (\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]->value" . $parameter['if condition']['var']['smarty_internal_index'] . " = " . $parameter['if condition']['value'] . "){?>";
                } else {
                    $_output = "<?php  }else{ if (!isset(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "])) \$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "] = new smarty_Variable(null{$_nocache});";
                    $_output .= "if (\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "]->value = " . $parameter['if condition']['value'] . "){?>";
                }
                return $_output;
            } else {
                $this->openTag($compiler, 'elseif', array($nesting, $compiler->tag_nocache));
                return "<?php }elseif({$parameter['if condition']}){?>";
            }
        } else {
            $tmp = '';
            foreach ($compiler->prefix_code as $code)
            $tmp .= $code;
            $compiler->prefix_code = array();
            $this->openTag($compiler, 'elseif', array($nesting + 1, $compiler->tag_nocache));
            if ($condition_by_assign) {
                if (is_array($parameter['if condition']['var'])) {
                    $_output = "<?php }else{?>{$tmp}<?php  if (!isset(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]) || !is_array(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]->value)) \$_smarty_tpl->createLocalArrayVariable(" . $parameter['if condition']['var']['var'] . "$_nocache);\n";
                    $_output .= "if (\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var']['var'] . "]->value" . $parameter['if condition']['var']['smarty_internal_index'] . " = " . $parameter['if condition']['value'] . "){?>";
                } else {
                    $_output = "<?php }else{?>{$tmp}<?php if (!isset(\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "])) \$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "] = new smarty_Variable(null{$_nocache});";
                    $_output .= "if (\$_smarty_tpl->tpl_vars[" . $parameter['if condition']['var'] . "]->value = " . $parameter['if condition']['value'] . "){?>";
                }
                return $_output;
            } else {
                return "<?php }else{?>{$tmp}<?php if ({$parameter['if condition']}){?>";
            }
        }
    }

}

/**
* smarty Internal Plugin Compile Ifclose class
*
* @package smarty
* @subpackage Compiler
*/
class smarty_Internal_Compile_Ifclose extends smarty_Internal_CompileBase {

    /**
    * Compiles code for the {/if} tag
    *
    * @param array  $args       array with attributes from parser
    * @param object $compiler   compiler object
    * @param array  $parameter  array with compilation parameter
    * @return string compiled code
    */
    public function compile($args, $compiler, $parameter)
    {
        // must endblock be nocache?
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }
        list($nesting, $compiler->nocache) = $this->closeTag($compiler, array('if', 'else', 'elseif'));
        $tmp = '';
        for ($i = 0; $i < $nesting; $i++) {
            $tmp .= '}';
        }
        return "<?php {$tmp}?>";
    }

}

?>