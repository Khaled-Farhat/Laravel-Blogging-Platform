{{ Form::label('Email: ', null, ['class' => 'control-label mt-3']) }}
{{ Form::email('email', old('email'), array_merge([
        $inputAttributes,
        'class' => 'form-control '
            . ($errors->has('email') ? 'is-invalid ' : '')
            . $inputClass,
    ])) }}

@error('email')
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
