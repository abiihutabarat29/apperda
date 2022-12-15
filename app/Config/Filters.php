<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filteruser' => \App\Filters\FilterUser::class,
        'filterhukum' => \App\Filters\FilterHukum::class,
        'filterketua' => \App\Filters\FilterKetua::class,
        'filtersetwan' => \App\Filters\FilterSetwan::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'filteradmin' => ['except' => [
                '/', 'front/*',
                'jadwal',
                'site-admin', 'auth/*',
            ]],
            'filteruser' => ['except' => [
                '/', 'front/*',
                'jadwal',
                'site-admin', 'auth/*',
            ]],
            'filterhukum' => ['except' => [
                '/', 'front/*',
                'jadwal',
                'site-admin', 'auth/*',
            ]],
            'filterketua' => ['except' => [
                '/', 'front/*',
                'jadwal',
                'site-admin', 'auth/*',
            ]],
            'filtersetwan' => ['except' => [
                '/', 'front/*',
                'jadwal',
                'site-admin', 'auth/*',
            ]],
        ],
        'after' => [
            'toolbar',
            'filteradmin' => ['except' => [
                'admin/home', 'home/*',
                'admin/data-user',
                'admin/data-user/*',
                'admin/data-instansi',
                'admin/data-instansi/*',
                'admin/api/data-instansi',
                'admin/api/data-instansi/*',
                'admin/verifikasi-perda',
                'admin/verifikasi-perda/*',
                'admin/my-profil',
                'admin/my-profil/*',
                'admin/slideshow',
                'admin/slideshow/*',
                'admin/data-anggota',
                'admin/data-anggota/*',
                'admin/data-file',
                'admin/data-file/*',
            ]],
            'filteruser' => ['except' => [
                'admin/home', 'admin/home/*',
                'admin/my-profil',
                'admin/my-profil/*',
                'admin/perda',
                'admin/perda/*',
            ]],
            'filterhukum' => ['except' => [
                'admin/home', 'admin/home/*',
                'admin/my-profil',
                'admin/my-profil/*',
                'admin/pengajuan-perda',
                'admin/pengajuan-perda/*',
            ]],
            'filterketua' => ['except' => [
                'admin/home', 'admin/home/*',
                'admin/my-profil',
                'admin/my-profil/*',
                'admin/perda-terverifikasi',
                'admin/perda-terverifikasi/*',
            ]],
            'filtersetwan' => ['except' => [
                'admin/home', 'admin/home/*',
                'admin/my-profil',
                'admin/my-profil/*',
                'admin/verif-perda',
                'admin/verif-perda/*',
            ]],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
