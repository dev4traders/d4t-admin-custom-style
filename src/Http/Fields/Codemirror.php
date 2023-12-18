<?php

namespace D4T\Admin\CustomStyle\Http\Fields;

use Dcat\Admin\Form\Field;
use D4T\Admin\CustomStyle\Enums\CodemirrorMode;

class Codemirror extends Field
{
    protected $view = 'dev4traders.d4t-admin-custom-style::codemirror';
    protected CodemirrorMode $mode = CodemirrorMode::CSS;

    public function mode(CodemirrorMode $mode) : Codemirror {
        return $this;
    }

    public function render()
    {
        $this->addVariables([
            'mode' => $this->mode
        ]);
        return parent::render();
    }
}
