<?php
namespace JustTasks;
class Loader
{

    public static $library;

    protected static $classPath = __DIR__ . "/classes/";

    public function __construct($requireInterface = true)
    {
        if(!isset(static::$library)) {
            // Get all files inside the class folder
            foreach(array_map('basename', glob(static::$classPath . "*.php", GLOB_BRACE)) as $classExt) {
                // Make sure the class is not already declared
                if(!in_array($classExt, get_declared_classes())) {
                    // Get rid of php extension easily without pathinfo
                    $classNoExt = substr($classExt, 0, -4);
                    $file = static::$classPath . $classExt;
                    // Require class
                    require_once $file;
                    // Check if class file exists
                    if (!class_exists('JustTasks\\' . $classNoExt)) {
                        // Throw error
                        die("Unable to load class: " . $classNoExt);
                    } else {
                        // Set class        // class.container.php
                        //static::$library[$classNoExt] = new $classNoExt();
                    }
                }
            }
        }
    }
}