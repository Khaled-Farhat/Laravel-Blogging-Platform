{{ Form::label($labelName, null, ['class' => 'control-label mt-3']) }}
{{ Form::password($inputName, array_merge([
        $inputAttributes,
        'class' => 'form-control '
            . ($errors->has($inputName) ? 'is-invalid ' : '')
            . $inputClass,
    ])) }}

@error($inputName)
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
