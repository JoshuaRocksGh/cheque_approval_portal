@extends('layouts.app')

@section('content')

    <div class="col-md-4 col-lg-4 col-xl-4 card"
        style="display: inline-block;position: fixed;top: 0;bottom: 0;left: 0;right: 0;width: auto;height: 430px;margin: auto;background-color: #ffffffd1">

        <div class="card-body">

            <h3 class="text-center ">
                <span class="logo-lg">
                    <img src="assets/images/logoo.png" alt="" height="60" style="margin-bottom: 10px;">

                    <h2 class="gold-color">
                        Cheque Approval Portal
                    </h2>
                </span>
            </h3>



            <form method="POST" action="{{ url('post-login') }}" autocomplete="off">
                @csrf

                <div class="form-group mb-2">
                    <label for="emailaddress">Username</label>
                    <input id="text" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                        name="username" value="{{ old('username') }}" required autofocus placeholder="Enter your email">
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                        placeholder="Enter your password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>


                <div class="form-group mb-3 text-center">
                    <button class="btn btn-primary btn-block custom-bg-color" type="submit"> Log In </button>

                    @if(session('error'))
                        <br>
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                               {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    @endif

                     @if ($errors->any())
                    <br>
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                    @endif

                </div>
          </form>
            {{-- <a href="{{ url('/returns') }}">
                <button class="btn btn-primary btn-block custom-bg-color"> Log In </button>
            </a> --}}

            {{-- <div class="text-center">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="#">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div> --}}

        </div>

    </div>


@endsection
