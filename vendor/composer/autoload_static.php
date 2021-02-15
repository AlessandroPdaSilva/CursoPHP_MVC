<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc1e67ee7b4b006c726a0a74ef8ea4e6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Upload' => 
            array (
                0 => __DIR__ . '/..' . '/codeguy/upload/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc1e67ee7b4b006c726a0a74ef8ea4e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc1e67ee7b4b006c726a0a74ef8ea4e6::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbc1e67ee7b4b006c726a0a74ef8ea4e6::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbc1e67ee7b4b006c726a0a74ef8ea4e6::$classMap;

        }, null, ClassLoader::class);
    }
}