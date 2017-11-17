<?php

class Autoload {
    
    private static $_instance = null;

    /** 
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
     * @global string $dir
     * @param string $class
     */
    private static function _autoload(string $class) {
        global $dir;
        $filename = $class.'.php';
        $dir2 =array('model/','./','config/','controller/','views/');
        foreach ($dir2 as $d){
            $file=$dir.$d.$filename; 
            //echo $file;
            if (file_exists($file))
            {
                include $file;
            }
        }
    }
}
?>
