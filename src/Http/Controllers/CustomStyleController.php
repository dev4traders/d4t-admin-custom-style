<?php

namespace D4T\Admin\CustomStyle\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Layout\Content;
use D4T\Admin\CustomStyle\ServiceProvider;
use D4T\Admin\CustomStyle\Enums\CodemirrorMode;
use Dcat\Admin\Http\Controllers\AdminController;
use D4T\Admin\CustomStyle\Http\Fields\Codemirror;

class CustomStyleController extends AdminController
{

    public function index(Content $content): Content
    {
        return $content
            ->body($this->form());
    }

    public function save()
    {
        return $this->form()->store();
    }

    protected function form()
    {
        $form = new Form();

        $form->title(ServiceProvider::trans('custom-style.title'));
        $form->extend('codemirror', Codemirror::class);
        $form->disableListButton();
        $form->disableEditingCheck();
        $form->disableViewCheck();
        $form->disableCreatingCheck();
        $form->disableResetButton();
        $form->action(ServiceProvider::URL_CUSTOM_STYLE.'/save');

        $form->codemirror(ServiceProvider::FIELD_CUSTOM_STYLE, ServiceProvider::trans('custom-style.css'))
            ->mode(CodemirrorMode::CSS)
            ->help(ServiceProvider::trans('custom-style.help_css'))
            ->default(ServiceProvider::setting(ServiceProvider::FIELD_CUSTOM_STYLE));
        $form->saving(function (Form $form) {

            ServiceProvider::setting([ServiceProvider::FIELD_CUSTOM_STYLE => $form->custom_style]);

            return $form->response()->success(__('admin.save_succeeded'));
        });

        return $form;
    }
}
