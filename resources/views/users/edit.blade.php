@extends('layouts.app')


@section('content')
<div class="container-fluid">
@if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
        @endif
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8"> User</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page"> User Edit</li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <!-- ---------------------
                                          start Event Registration
                                      ---------------- -->
                        <div class="card">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                <div class="card-body">
                                    <h5> User Edit</h5>
                                   
                                   
                                    <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                         
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <div class="row m-auto">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="fname3" class="control-label col-form-label">
                                                    Name</label>
                                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="title2" class="control-label col-form-label">Email</label>
                                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="title2" class="control-label col-form-label">Password</label>
                                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="title2" class="control-label col-form-label">Confirm Password</label>
                                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="title2" class="control-label col-form-label">Role</label>
                                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="p-3 border-top">
                                    <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                                    Save
                                                </button>
                                                <button
                                                    class="btn btn-dark rounded-pill px-4 waves-effect waves-light">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- ---------------------
                                          end Event Registration
                                      ---------------- -->
                    </div>
                </div>
</div>
@endsection