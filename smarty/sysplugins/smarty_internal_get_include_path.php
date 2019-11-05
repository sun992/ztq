<?php
/**
 * smarty read include path plugin
 *
 * @package smarty
 * @subpackage PluginsInternal
 * @author Monte Ohrt
 */

/**
 * smarty Internal Read Include Path class
 *
 * @package smarty
 * @subpackage PluginsInternal
 */
class smarty_Internal_Get_Include_Path {

    /**
     * Return full file path from PHP include_path
     *
     * @param string $filepath filepath
     * @return string|boolean full filepath or false
     */
    public static function getIncludePath($filepath)
    {
        static $_include_path = null;
        
        if (function_exists('stream_resolve_include_path')) {
            // available since PHP 5.3.2
            return stream_resolve_include_path($filepath);
        }

        if ($_include_path === null) {
            $_include_path = explode(PATH_SEPARATOR, get_include_path());
        }

        foreach ($_include_path as $_path) {
            if (file_exists($_path . DS . $filepath)) {
                return $_path . DS . $filepath;
            }
        }

        return false;
    }

}

?>