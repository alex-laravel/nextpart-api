@if (session()->has('flash_primary'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session()->get('flash_primary') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_secondary'))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        {{ session()->get('flash_secondary') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('flash_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('flash_danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('flash_warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session()->get('flash_info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_light'))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
        {{ session()->get('flash_light') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('flash_dark'))
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        {{ session()->get('flash_dark') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('status'))
    <div>STATUS MESSAGE:</div>
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('resent'))
    <div>RESENT MESSAGE:</div>
    <div class="alert alert-success" role="alert">
        {{ session('resent') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span><br/>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
