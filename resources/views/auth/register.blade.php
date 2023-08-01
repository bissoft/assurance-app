@extends('layouts.auth')

@section('content')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
          <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
              <div class="col-md-8 col-lg-6 col-xxl-3 ">
                <div class="card mb-0">
                  <div class="card-body">
                    <a href=" " class="text-nowrap logo-img text-center d-block mb-5 w-100">
                      <!-- <img src=" " width="180" alt="logo"> -->
                    </a>
                     
                    <div class="position-relative text-center my-4">
                      <p class="mb-0 fs-4 px-3 d-inline-block bg-white z-index-5 position-relative"> sign Up with</p>
                      <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInputtext" aria-describedby="textHelp">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror 
                     </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>                    
                      <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                      <div class="d-flex align-items-center">
                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                        <a class="text-primary fw-medium ms-2" href="{{route('login')}}">Sign In</a>
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
