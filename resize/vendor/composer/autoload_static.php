<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70b1e37800856ee6349c53d2c3357e1e
{
    public static $classMap = array (
        'Zebra_Image' => __DIR__ . '/..' . '/stefangabos/zebra_image/Zebra_Image.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit70b1e37800856ee6349c53d2c3357e1e::$classMap;

        }, null, ClassLoader::class);
    }
}