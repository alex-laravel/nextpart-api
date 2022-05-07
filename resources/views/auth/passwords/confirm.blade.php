@extends('auth.layout.main')

@section('title', trans('labels.auth.password_confirm.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form action="{{ route('password.confirm') }}" method="POST">
                    @csrf
                    <p>{{ trans('labels.auth.password_confirm.title') }}</p>

                    <div class="input-group mt-3 mb-4">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                              <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                            </svg>
                        </span>

                        <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('labels.auth.password_confirm.form.password') }}" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-block btn-primary rounded-0" type="submit">
                                {{ trans('buttons.auth.password_confirm') }}
                            </button>
                        </div>

                        <div class="col-6 text-end">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ trans('labels.auth.password_confirm.forgot_password') }}
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
