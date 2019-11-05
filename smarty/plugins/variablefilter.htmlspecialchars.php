<?php
/**
 * smarty plugin
 *
 * @package smarty
 * @subpackage PluginsFilter
 */

/**
 * smarty htmlspecialchars variablefilter plugin
 *
 * @param string                   $source input string
 * @param smarty_Internal_Template $smarty smarty object
 * @return string filtered output
 */
function smarty_variablefilter_htmlspecialchars($source, $smarty)
{
    return htmlspecialchars($source, ENT_QUOTES, smarty::$_CHARSET);
}

?>