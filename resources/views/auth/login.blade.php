@extends('auth.layout.main')

@section('title', trans('labels.auth.login.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1>{{ trans('labels.auth.login.title') }}</h1>
                    <p class="text-medium-emphasis">{{ trans('labels.auth.login.sign_in') }}</p>

                    <div class="input-group mb-3">
                        <span class="input-group-text rounded-0">
                          <svg class="icon">
                            <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-envelope-open') }}"></use>
                          </svg>
                        </span>

                        <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ trans('labels.auth.login.form.login') }}" required autocomplete="email" autofocus>

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

                        <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('labels.auth.login.form.password') }}"  required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input rounded-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ trans('labels.auth.login.remember_me') }}
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary rounded-0 px-4" type="submit">
                                {{ trans('buttons.auth.login') }}
                            </button>
                        </div>

                        <div class="col-6 text-end">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ trans('labels.auth.login.forgot_password') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
