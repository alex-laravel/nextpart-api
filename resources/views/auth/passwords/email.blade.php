@extends('auth.layout.main')

@section('title', trans('labels.auth.password_email.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1>{{ trans('labels.auth.password_email.title') }}</h1>

                    <div class="input-group my-4">
                        <span class="input-group-text rounded-0">
                            <svg class="icon">
                                <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-envelope-open') }}"></use>
                            </svg>
                        </span>

                        <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ trans('labels.auth.password_email.form.email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary rounded-0 px-4" type="submit">
                                {{ trans('buttons.auth.password_reset_link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
