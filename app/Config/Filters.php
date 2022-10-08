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
                '/', 'auth/*',
            ]],
            'filteruser' => ['except' => [
                '/', 'auth/*',
            ]],
        ],
        'after' => [
            'toolbar',
            'filteradmin' => ['except' => [
                'home', 'home/*',
                'data-user',
                'data-user/*',
                'data-bagian',
                'data-bagian/*',
                'data-anggaran',
                'data-anggaran/*',
                'data-sub-kegiatan',
                'data-sub-kegiatan/*',
                'data-kode-rekening',
                'data-kode-rekening/*',
                'data-kegiatan',
                'data-kegiatan/*',
                'data-gu',
                'data-gu/*',
                'sub-kegiatan/import',
                'sub-kegiatan/import/*',
                'kode-rekening/import',
                'kode-rekening/import/*',
                'api/data-bagian',
                'api/data-bagian/*',
                'api/data-kegiatan',
                'api/data-kegiatan/*',
                'my-profil',
                'my-profil/*',
                'data-sppd',
                'data-sppd/*',
                'data-spjkegiatan',
                'data-spjkegiatan/*',
            ]],
            'filteruser' => ['except' => [
                'home', 'home/*',
                'sppd',
                'sppd/*',
                'kegiatan',
                'kegiatan/*',
                'api/data-rekening',
                'api/data-rekening/*',
                'api/data-kegiatan',
                'api/data-kegiatan/*',
                'api/data-sub-kegiatan',
                'api/data-sub-kegiatan/*',
                'my-profil',
                'my-profil/*',
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
