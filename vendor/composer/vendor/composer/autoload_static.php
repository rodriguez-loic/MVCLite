<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
            'Components\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
        'Components\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Components',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}