<x-auth-main title="Owner Login">
    <div class="login-box">
        <div class="login-logo">
            <h2>Owner Login</h2>
        <img src="/img/logo.jpg" alt="">
        </div>

        <div class="card" style="border: rounded">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('owner.check') }}" method="post">
                    @csrf
            <div class="mb-3">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger">@error('email') {{ $message }}@enderror</span>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>

            <div class="row col-4 justify-content-center">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            </form>
        </div>
    </div>
</x-auth-main>