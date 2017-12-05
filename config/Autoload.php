<?php

class Autoload {
    
    private static $_instance = null;

    /** 
     * Check if the function _autoload was start, and if she can't start
     * @throws RuntimeException
     */
    public static function load() {
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }
        self::$_instance = new self();
        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    /**
     * Stop the _autoload, and diplay if we can't do this
     * @throws RuntimeException
     */
    public static function shutDown() {
        if(null !== self::$_instance) {
            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }
            self::$_instance = null;
        }
    }

    /**
     * Allows the loading of all the files
     * @global string $dir
     * @param string $class
     */
    private static function _autoload(string $class) {
        global $dir;
        $filename = $class.'.php';
        $dir2 =array('model/','config/','controller/');
        foreach ($dir2 as $d){
            $file=$dir.$d.$filename; 
            if (file_exists($file))
            {
                include $file;
            }
        }
    }
}
?>
