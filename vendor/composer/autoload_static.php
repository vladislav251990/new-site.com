<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad22153f0a2aef9baefc613399f5ea56
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad22153f0a2aef9baefc613399f5ea56::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad22153f0a2aef9baefc613399f5ea56::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
