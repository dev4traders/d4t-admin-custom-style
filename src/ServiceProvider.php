<?php

namespace D4T\Admin\CustomStyle;

use Dcat\Admin\Admin;

use Dcat\Admin\Enums\ExtensionType;
use Dcat\Admin\Extend\ServiceProvider as ServiceProviderBase;

class ServiceProvider extends ServiceProviderBase
{
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

    public function settingForm()
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();

        if ($this->setting('custom_style'))
            Admin::style($this->setting('custom_style'));
    }
}
