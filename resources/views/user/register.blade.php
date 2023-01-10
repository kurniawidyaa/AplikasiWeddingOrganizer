<x-auth-main title="User Register">
    <div class="register-box">
        <div class="register-logo">
        <img src="/img/logo.jpg" alt="" sizes="" srcset="">
        </div>

        <div class="card" style="border: rounded">
            <div class="card-body register-card-body" >
                <p class="login-box-msg">Register a new account</p>
                <form action="{{ route('user.regist') }}" method="post">
                    @csrf
            {{-- input name --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name') }}" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            
            {{-- input email --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            {{-- input phone number --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="phone" placeholder="phone" value="{{ old('phone') }}" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
            </div>

            {{-- input address --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="address" placeholder="address" value="{{ old('address') }}" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-marker"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
            </div>

            {{-- input password --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}"> 
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" value="{{ old('confirmPassword') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div><br>
                </div>
                <span class="text-danger">@error('confirmPassword') {{ $message }} @enderror</span>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary btn-block col-4 ">Register</button>
            </div>
            </form>

            <div class="social-auth-links text-center">
            <a href="{{ route('user.login') }}" class="text-center text-decoration-none">I already have account</a>
            </div>

        </div>
    </div>

</x-auth-main>