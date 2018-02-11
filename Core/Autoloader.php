<?php

/**
 * Class Autoloader
 *
 * Find and load classes.
 * How it use:
 * Include file with Autoloader class to index.php file.
 * Create object Autoloader class and call method run().
 */
class Autoloader
{
    /**
     * @var string $basePath It contains application path.
     */
    private $basePath;

    /**
     * Autoloader constructor.
     *
     * Set base directory application
     */
    public function __construct($conf = [])
    {
        $this->basePath = dirname(__DIR__);
    }

    /**
     * This method start process of autoload
     */
    public function run()
    {
        spl_autoload_register(array($this, 'ClassLoad'));
    }

    /**
     * This method searches and include classes.
     *
     * @param string $class contain name included classes.
     * @return string
     */
    public function ClassLoad($class)
    {
        $namespace = explode('\\', $class);
        $className = $namespace[count($namespace) - 1];
        $namespace = str_replace('\\'.$className, '', $class);

        $classFolder = $namespace;

        $classPath = $this->basePath .'\\' . $classFolder . '\\' . $className . '.php';
        if(file_exists($classPath)) {
            return require_once $classPath;
        }

    }
}