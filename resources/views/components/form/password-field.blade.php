@php
    $classesToAppend = ' form-control' . ($errors->has($inputName) ? ' is-invalid ' : '');

    if (array_key_exists('class', $inputAttributes)) {
        $inputAttributes['class'] .= $classesToAppend;
    }
    else {
        $inputAttributes['class'] = $classesToAppend;
    }
@endphp

{!! Form::label($labelName, null, ['class' => 'control-label mt-3']) !!}
{!! Form::password($inputName, $inputAttributes) !!}

@error($inputName)
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
