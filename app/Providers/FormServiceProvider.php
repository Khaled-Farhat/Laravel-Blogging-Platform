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
            'inputClass' => '',
            'inputAttributes' => '',
        ]);

        Form::component('passwordField', 'components.form.password-field', [
            'inputClass' => '',
            'inputAttributes' => '',
        ]);

        Form::component('submitButton', 'components.form.submit-button', [
            'buttonText' => 'Submit',
            'buttonType' => 'primary',
            'buttonClass' => '',
        ]);

        Form::component('textField', 'components.form.text-field', [
            'labelName',
            'inputName',
            'inputClass' => '',
            'inputAttributes' => '',
        ]);

        Form::component('textareaField', 'components.form.textarea-field', [
            'labelName',
            'inputName',
            'inputClass' => '',
            'inputAttributes' => '',
        ]);
    }
}
