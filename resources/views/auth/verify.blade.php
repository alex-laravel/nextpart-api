@extends('auth.layout.main')

@section('title', trans('labels.auth.verify.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-4 mx-4 rounded-0">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <h1>{{ trans('labels.auth.verify.title') }}</h1>

                    <p class="text-medium-emphasis">
                        {{ trans('strings.auth.verify.check_email_for_verification_link') }}
                    </p>

                    <p class="text-medium-emphasis">
                        {{ trans('strings.auth.verify.not_receive_email') }}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('strings.auth.verify.another_verification_email') }}</button>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
