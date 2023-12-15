@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }} alert-dismissible fade show"
        role="alert">
        {{ Session::get('flash_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
