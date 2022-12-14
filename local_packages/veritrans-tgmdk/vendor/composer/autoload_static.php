<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7fdc00a11c69dd4a471fc1168967839e
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tgMdk\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tgMdk\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/tgMdk',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7fdc00a11c69dd4a471fc1168967839e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7fdc00a11c69dd4a471fc1168967839e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7fdc00a11c69dd4a471fc1168967839e::$classMap;

        }, null, ClassLoader::class);
    }
}
