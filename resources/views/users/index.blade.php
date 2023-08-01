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
                      <h4 class="fw-semibold mb-8"> Users List</h4>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a class="text-muted" href="dashboard.html">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item" aria-current="page">User  </li>
                        </ol>
                      </nav>
                    </div>
                     
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-12">
                    <!-- ---------------------
                            start Alternative Pagination
                        ---------------- -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-3">   Users List</h5>
                            </div>
                        
                            <div class="table-responsive">
                                <table id="alt_pagination"
                                    class="table border table-striped table-bordered display text-nowrap"
                                    style="width: 100%">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>   
                                    <tbody>
                                    @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success" style="color: black;">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                        </td>
                                        <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------
                            end Alternative Pagination
                        ---------------- -->
                </div>
            </div>
    
        </div>
@endsection        