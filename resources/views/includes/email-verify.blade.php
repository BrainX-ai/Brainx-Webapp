@if (Auth::check() && Auth::user()->email_verified_at == null)
    <div class="alert alert-info text-center" role="alert">
        Your email is <span class="text-danger"> not</span> verified. Please check your email to verify your
        account.
        <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-primary ms-3  ">
                Resend email
            </button>.
        </form>
    </div>
@endif
