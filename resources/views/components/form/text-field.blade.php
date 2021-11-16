{{ Form::label($labelName, null, ['class' => 'control-label']) }}
{{ Form::text($inputName, old($inputName), array_merge([
        $inputAttributes,
        'class' => 'form-control '
            . ($errors->has($inputName) ? 'is-invalid ' : '')
            . $inputClass,
    ])) }}

@error($inputName)
    <div class="text-danger mx-2">
        {{ $message }}
    </div>
@enderror
