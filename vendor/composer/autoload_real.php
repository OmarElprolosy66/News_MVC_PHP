<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc86eb74c13884e5e18c51e4d1289fea2
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc86eb74c13884e5e18c51e4d1289fea2', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc86eb74c13884e5e18c51e4d1289fea2', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc86eb74c13884e5e18c51e4d1289fea2::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
