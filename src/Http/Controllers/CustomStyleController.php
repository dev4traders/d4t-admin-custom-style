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
        $form->action('custom-style/save');

        $form->codemirror('custom_style', ServiceProvider::trans('custom-style.css'))
            ->mode(CodemirrorMode::CSS)
            ->help(ServiceProvider::trans('custom-style.help_css'))
            ->default(ServiceProvider::setting('custom_style'));
        $form->saving(function (Form $form) {

            ServiceProvider::setting(['custom_style' => $form->custom_style]);

            return $form->response()->success(__('admin.save_succeeded')); //->redirect($form->resource(0));
        });

        return $form;
    }
}
