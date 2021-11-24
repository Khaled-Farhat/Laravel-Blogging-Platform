@php
    $classesToAppend = 'mt-2 btn btn-' . $buttonType;

    if (array_key_exists('class', $inputAttributes)) {
        $inputAttributes['class'] .= $classesToAppend;
    }
    else {
        $inputAttributes['class'] = $classesToAppend;
    }
@endphp

{!! Form::submit($buttonText, $inputAttributes) !!}
