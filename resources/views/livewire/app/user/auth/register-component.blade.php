<div>
    <div class="row" style="height: auto;">
        <div class="col-12 p-0 mt-lg-5 mb-5 pb-5 my-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-overlay" style="background-color: rgba(85, 110, 230, 0.25);"></div>
                    <div class="d-flex h-100 flex-column">
                        <div class="p-4 my-auto">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="text-center">
                                        <h4 class="mb-2">Welcome to {{ setting()->site_title }}!</h4>
                                        <div class="mt-4 text-center">
                                            <p class="mb-1">Already have an account ?</p>
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-dark"> Login now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-5">
                    <div class="mb-3 text-center">
                        <a href="/">
                            <span class="bg-dark p-2" style="border-radius: 5px;"><img src="{{ asset(setting()->logo) }}" alt="" height="18" class="auth-logo-dark"></span>
                        </a>
                    </div>

                    <div class="text-center">
                        <h6 class="text-muted">Create New Account</h6>
                    </div>

                    <div class="mt-4">
                        <form wire:submit.prevent='userRegistration'>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" wire:model='first_name' id="first_name" placeholder="Enter first name">
                                    @error('first_name')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" wire:model='last_name' id="last_name" placeholder="Enter last name">
                                    @error('last_name')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" wire:model='email' id="email" placeholder="Enter email">
                                    @error('email')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" wire:model='phone' id="phone" placeholder="Enter phone">
                                    @error('phone')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" wire:model='password' id="password" placeholder="Enter password">
                                    @error('password')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" wire:model='confirm_password' id="confirm_password" placeholder="Enter confirm password">
                                    @error('confirm_password')
                                        <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    {!! loadingStateWithText('userRegistration', 'Sign Up') !!}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
