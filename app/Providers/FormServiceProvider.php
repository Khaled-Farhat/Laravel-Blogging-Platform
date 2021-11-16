<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('textField', 'components.form.text-field', [
            'labelName',
            'inputName',
            'inputClass' => '',
            'inputAttributes' => '',
        ]);
    }
}
