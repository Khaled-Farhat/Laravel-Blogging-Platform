{{ Form::label('Password: ', null, ['class' => 'control-label mt-3']) }}
{{ Form::password('password', array_merge([
        $inputAttributes,
        'class' => 'form-control '
            . ($errors->has('password') ? 'is-invalid ' : '')
            . $inputClass,
    ])) }}

@error('password')
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
