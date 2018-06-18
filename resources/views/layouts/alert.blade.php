@if ($flash = session('message_success'))
    <div id="flash-message" class="alert alert-success"  >
        {{ $flash }}
        {{ Session::forget('message_success') }}
    </div>
@endif

<div id="flash-message" class="alert alert-danger" style="display: none;">

</div>
