<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf13714821cfd49578d7eccfe4f2e9eef
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Importapp\\App\\View\\Error\\' => 25,
            'Importapp\\App\\View\\' => 19,
            'Importapp\\App\\Routers\\' => 22,
            'Importapp\\App\\Models\\' => 21,
            'Importapp\\App\\DB\\' => 17,
            'Importapp\\App\\Controllers\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Importapp\\App\\View\\Error\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views/import-layout/error',
        ),
        'Importapp\\App\\View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views/import-layout',
        ),
        'Importapp\\App\\Routers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/components/Routes',
        ),
        'Importapp\\App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Importapp\\App\\DB\\' => 
        array (
            0 => __DIR__ . '/../..' . '/components/DB',
        ),
        'Importapp\\App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf13714821cfd49578d7eccfe4f2e9eef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf13714821cfd49578d7eccfe4f2e9eef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf13714821cfd49578d7eccfe4f2e9eef::$classMap;

        }, null, ClassLoader::class);
    }
}
