@php
    if (array_key_exists('class', $inputAttributes)) {
        $inputAttributes['class'] .= ' cusom-select';
    }
    else {
        $inputAttributes['class'] = ' custom-select';
    }
@endphp

{!! Form::label($labelName, null, ['class' => 'control-label mt-3']) !!}
{!! Form::select($inputName, $options, null, $inputAttributes) !!}

@error($inputName)
    <div class="text-danger mb-1">
        {{ $message }}
    </div>
@enderror
