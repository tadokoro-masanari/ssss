<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit713a3700d87c2ac350524e43100ff3aa
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
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tgMdk\\' => 
        array (
            0 => __DIR__ . '/..' . '/veritrans/tgmdk/src/tgMdk',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit713a3700d87c2ac350524e43100ff3aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit713a3700d87c2ac350524e43100ff3aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit713a3700d87c2ac350524e43100ff3aa::$classMap;

        }, null, ClassLoader::class);
    }
}