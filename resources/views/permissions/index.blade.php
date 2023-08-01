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
                      <h4 class="fw-semibold mb-8"> Permission List</h4>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a class="text-muted" href="dashboard.html">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item" aria-current="page">Permission  </li>
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
                                <h5 class="mb-3">Permission List</h5>
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
                                            
                                            <th>Action</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>   
                                    <tbody>
                                    @foreach ($permissions as $key => $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('permissions.show',$role->id) }}">Show</a>
                                            @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('permissions.edit',$role->id) }}">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy',
                                            $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
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