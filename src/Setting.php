<?php

namespace D4T\Admin\CustomStyle;

use Dcat\Admin\Form as BaseForm;

use Dcat\Admin\Extend\Setting as Form;
use D4T\Admin\CustomStyle\Fields\Codemirror;
use D4T\Admin\CustomStyle\Enums\CodemirrorMode;

class Setting extends Form
{
    public function title()
    {
        return $this->trans('custom-style.title');
    }

    public function form()
    {
        //BaseForm::extend('codemirror', Codemirror::class);

        // $this->codemirror('custom_style')
        //     ->help('Hit F5 button (Refresh page) if you see editor layout is broken')
        //     ->mode(CodemirrorMode::CSS);
    }
}
