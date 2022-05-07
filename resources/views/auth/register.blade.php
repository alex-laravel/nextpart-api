@extends('auth.layout.main')

@section('title', trans('labels.auth.register.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h1>{{ trans('labels.auth.register.title') }}</h1>
                    <p>{{ trans('labels.auth.register.create_account') }}</p>

                    <div class="input-group mb-3">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                              <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-user') }}"></use>
                            </svg>
                        </span>

                        <input type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ trans('labels.auth.register.form.name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                              <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-envelope-open') }}"></use>
                            </svg>
                        </span>

                        <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ trans('labels.auth.register.form.email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                              <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                            </svg>
                        </span>

                        <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('labels.auth.register.form.password') }}" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                              <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                            </svg>
                        </span>

                        <input type="password" class="form-control rounded-0" name="password_confirmation" placeholder="{{ trans('labels.auth.register.form.password_confirm') }}" required autocomplete="new-password">
                    </div>

                    <button class="btn btn-block btn-primary rounded-0" type="submit">
                        {{ trans('buttons.auth.register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
