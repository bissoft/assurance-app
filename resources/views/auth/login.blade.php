@extends('layouts.auth')

@section('content')
   

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
          <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
              <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                  <div class="card-body">
                    <a href="dashboard.html" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                      <!-- <img src=" " width="180" alt="logo"> -->
                    </a>
                  
                    <div class="position-relative text-center my-4">
                      <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">sign in with</p>
                      <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                          <input class="form-check-input primary" name="remember" type="checkbox" value="" id="flexCheckChecked" checked>
                          <label class="form-check-label text-dark" for="flexCheckChecked">
                            Remeber this Device
                          </label>
                        </div>
                        <a class="text-primary fw-medium" href="{{ route('password.request') }}">Forgot Password ?</a>
                      </div>
                      <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                      <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-medium"> Don't have an account ?</p>
                        <a class="text-primary fw-medium ms-2" href="{{route('register')}}">Create an account</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection    
 
 