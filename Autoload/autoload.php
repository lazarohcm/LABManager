<?php

/**
 * Description of autoload_real
 *
 * @author NME
 */
class autoload_real {

    public static function autoload($className) {
        
        $className = ltrim($className, '\\');
        $logicalPath = strtr($className, '\\', DIRECTORY_SEPARATOR) . ".php";
        
        $arrayNameSpace = require('autoload_namespaces.php');

        if (false !== ($pos = strrpos($className, '\\'))) {
            $logicalPath = substr($logicalPath, 0, $pos + 1)
                    . strtr(substr($logicalPath, $pos + 1), '_', DIRECTORY_SEPARATOR);
        } else {
            $logicalPath = strtr($className, '_', DIRECTORY_SEPARATOR) . ".php";
        }

        foreach ($arrayNameSpace as $prefix => $dirs) {
            if (0 === strpos($className, $prefix)) {
                foreach ($dirs as $dir) {
                    if (file_exists($file = $dir . DIRECTORY_SEPARATOR . $logicalPath)) {
                        require_once $file;
                    }
                }
            }
        }
        
        return FALSE;
    }

}

return spl_autoload_register(array('autoload_real', 'autoload'), true, true);
