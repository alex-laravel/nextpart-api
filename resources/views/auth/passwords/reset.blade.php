@extends('auth.layout.main')

@section('title', trans('labels.auth.password_reset.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <h1>{{ trans('labels.auth.password_reset.title') }}</h1>

                    <div class="input-group mt-4 mb-3">
                        <span class="input-group-text rounded-0">
                          <svg class="icon">
                            <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-envelope-open') }}"></use>
                          </svg>
                        </span>

                        <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ trans('labels.auth.password_reset.form.email') }}" required autocomplete="email" autofocus>

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

                        <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('labels.auth.password_reset.form.password') }}"  required autocomplete="new-password">

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

                        <input type="password" class="form-control rounded-0" name="password_confirmation" placeholder="{{ trans('labels.auth.password_reset.form.password_confirm') }}"  required autocomplete="new-password">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary rounded-0 px-4" type="submit">
                                {{ trans('buttons.auth.password_reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

