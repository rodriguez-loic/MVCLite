<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'S' => 
        array (
            'Spot\\' => 5,
            'SpotTest\\' => 9,
            'Sabre\\Event\\' => 12,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'D' => 
        array (
            'Doctrine\\DBAL\\' => 14,
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\' => 16,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
            'Components\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'Spot\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/spot2/lib',
        ),
        'SpotTest\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/spot2/tests',
        ),
        'Sabre\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabre/event/lib',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Doctrine\\DBAL\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/dbal/lib/Doctrine/DBAL',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/event-manager/lib/Doctrine/Common',
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

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInita9775b3ec6e37a8eb08daa0c26ace704::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
