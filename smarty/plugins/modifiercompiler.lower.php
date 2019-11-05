<?php
/**
 * smarty plugin
 * @package smarty
 * @subpackage PluginsModifierCompiler
 */

/**
 * smarty lower modifier plugin
 *
 * Type:     modifier<br>
 * Name:     lower<br>
 * Purpose:  convert string to lowercase
 *
 * @link http://www.smarty.net/manual/en/language.modifier.lower.php lower (smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Uwe Tews
 * @param array $params parameters
 * @return string with compiled code
 */

function smarty_modifiercompiler_lower($params, $compiler)
{
    if (smarty::$_MBSTRING) {
        return 'mb_strtolower(' . $params[0] . ', \'' . addslashes(smarty::$_CHARSET) . '\')' ;
    }
    // no MBString fallback
    return 'strtolower(' . $params[0] . ')';
}

?>