<?php
/**
 * smarty plugin
 *
 * @package smarty
 * @subpackage PluginsModifierCompiler
 */

/**
 * smarty noprint modifier plugin
 *
 * Type:     modifier<br>
 * Name:     noprint<br>
 * Purpose:  return an empty string
 *
 * @author   Uwe Tews
 * @param array $params parameters
 * @return string with compiled code
 */
function smarty_modifiercompiler_noprint($params, $compiler)
{
    return "''";
}

?>