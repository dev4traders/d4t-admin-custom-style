<?php

namespace D4T\Admin\CustomStyle;

use Dcat\Admin\Admin;

use Dcat\Admin\Enums\ExtensionType;
use Dcat\Admin\Extend\ServiceProvider as ServiceProviderBase;

class ServiceProvider extends ServiceProviderBase
{
    public const URL_CUSTOM_STYLE = 'custom-style';
    public const FIELD_CUSTOM_STYLE = 'custom_style';
    public const PERMISSION_CUSTOM_STYLE = 'mng.custom_style';

    public function getExtensionType(): ExtensionType
    {
        return ExtensionType::ADDON;
    }

    protected array $aliases = [
        '@codemirror' => [
            'js' => [
                'lib/codemirror.js',
                'mode/css/css.js',
                'mode/php/php.js'
            ],
            'css' => [
                'lib/codemirror.css',
            ]
        ]
    ];

    protected $menu = [
        [
            'title' => 'Custom Style',
            'uri' => self::URL_CUSTOM_STYLE,
            'icon' => 'fa-folder-open',
            'permission_slug' => self::PERMISSION_CUSTOM_STYLE
        ],
    ];

    protected array $permissions = [
        [
            'slug' => self::PERMISSION_CUSTOM_STYLE,
            'name' => 'Manage Custom Style',
            'path' => self::URL_CUSTOM_STYLE.'/*',
        ],
    ];

    public function settingForm()
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();

        if ($this->setting(self::FIELD_CUSTOM_STYLE))
            Admin::style($this->setting(self::FIELD_CUSTOM_STYLE));
    }
}
