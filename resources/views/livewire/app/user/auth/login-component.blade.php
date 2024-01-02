<div>
    <div class="row" style="height: 82.7vh;">
        <div class="col-12 p-0 m-0 my-auto">
            <div class="row">
                <div class="col-md-7">
                    <div class="bg-overlay" style="background-color: rgba(85, 110, 230, 0.25);"></div>
                    <div class="d-flex h-100 flex-column">
                        <div class="p-4 my-auto">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="text-center">
                                        <h4 class="mb-2">Welcome back!</h4>
                                        <div class="mt-4 text-center">
                                            <p class="mb-1">Don't have an account ?</p>
                                            <a href="{{ route('register') }}" class="btn btn-sm btn-dark"> Signup now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 p-5">
                    <div class="mb-4 text-center">
                        <a href="/">
                            <span class="bg-dark p-2" style="border-radius: 5px;"><img src="{{ asset(setting()->logo) }}" alt="" height="18" class="auth-logo-dark"></span>
                        </a>
                    </div>

                    <div class="text-center">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to your account.</p>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-12">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                @endif
                            </div>
                        </div>
                        <form wire:submit.prevent='userLogin'>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model='email' placeholder="Enter email">

                                @error('email')
                                    <p class="text-danger font-size-12">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                </div>
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" wire:model='password' aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                                @error('password')
                                    <p class="text-danger font-size-12">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-check">
                                <label class="form-check-label" for="remember-check">
                                    Remember me
                                </label>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    {!! loadingStateWithText('userLogin', 'Log In') !!}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
