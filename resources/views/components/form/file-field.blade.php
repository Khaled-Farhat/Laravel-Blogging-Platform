@php
    $inputAttributes['type'] = 'file';

    $classesToAppend = 'custom-file-input ' . ($errors->has($inputName) ? 'is-invalid ' : '');

    if (array_key_exists('class', $inputAttributes)) {
        $inputAttributes['class'] .= $classesToAppend;
    }
    else {
        $inputAttributes['class'] = $classesToAppend;
    }
@endphp

{!! Form::label($labelName, null, ['class' => 'control-label mt-3']) !!}
<div class="custom-file">
    {!! Form::file($inputName, $inputAttributes) !!}
    <label class="custom-file-label" for="{{ $inputName }}">Choose file</label>
</div>

@error($inputName)
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
