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
        Form::component('emailField', 'components.form.email-field', [
            'labelName',
            'inputName',
            'inputAttributes' => [],
        ]);

        Form::component('passwordField', 'components.form.password-field', [
            'labelName',
            'inputName',
            'inputAttributes' => [],
        ]);

        Form::component('selectField', 'components.form.select-field', [
            'labelName',
            'inputName',
            'options',
            'inputAttributes' => [],
        ]);

        Form::component('submitButton', 'components.form.submit-button', [
            'buttonText' => 'Submit',
            'buttonType' => 'primary',
            'buttonClass' => '',
        ]);

        Form::component('textField', 'components.form.text-field', [
            'labelName',
            'inputName',
            'inputAttributes' => [],
        ]);

        Form::component('textareaField', 'components.form.textarea-field', [
            'labelName',
            'inputName',
            'inputAttributes' => [],
        ]);
    }
}
