<div class="toast fixed-bottom ml-4 mb-4 {{ empty($textWhite) ? '' : 'text-white' }} bg-{{ $color }}" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
        {{ $message }}

        <button type="button" class="ml-2 mb-1 close  {{ empty($textWhite) ? '' : 'text-white' }}" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
