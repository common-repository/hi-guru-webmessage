<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e835f70d99705e1334b157b60b72a4e
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc_Higuru\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc_Higuru\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e835f70d99705e1334b157b60b72a4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e835f70d99705e1334b157b60b72a4e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
