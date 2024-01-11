<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="col-12 col-md-8 align-items-center flex-column mb-md-n5 mx-auto" id="">

            <div class="col-12 col-md-10 col-lg-8 mx-auto">

                <div class="panel-body rounded p-3">

                    <div class="col-12 p-2 p-sm-4 p-md-5 text-center">
                        <h2 class="display-3 fw-bold text-white">Login</h2>
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="form-outline mb-3" data-mdb-input-init>

                            <input id="email" type="email" class="form-control text-white" name="email" value="{{ old('email') }}" required autofocus>

                            <label for="email" class="form-label">E-Mail Address</label>

                            @if(session('errors'))
                                <!--Username/Password Combination error message-->
                                <div class="m-3">
                                    <span class="red-text">{{ session('errors') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-outline mb-3" data-mdb-input-init>

                            <input id="password" type="password" class="form-control text-white" name="password" required>

                            <label for="password" class="form-label">Password</label>
                        </div>

                        <div class="form-outline">

                            <button type="submit" class="btn btn-primary btn-lg mx-0">Login</button>

                            <a class="btn btn-link btn-light btn-lg white mx-0" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-app-layout>
