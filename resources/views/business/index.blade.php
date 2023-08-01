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
                      <h4 class="fw-semibold mb-8"> Build Template List</h4>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a class="text-muted" href="dashboard.html">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item" aria-current="page">Build Template  </li>
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
                                <h5 class="mb-3">Build Template</h5>
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
                                            <th>Line Of Business</th>
                                            <th>Action</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>   
                                    <tbody>
                                    @foreach ($products as $key => $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->line_of_business }}</td>
                                        <td>
                                            <div class="template_box_action">
                                            <a class="btn copy" href="{{ route('business.show',$role->id) }}"><i class="far fa-file-alt"></i> </a>
                                            @can('role-edit')
                                            <a class="btn copy" href="{{ route('business.edit',$role->id) }}"><i class="fas fa-pen"></i></a>
                                            @endcan
                                            @can('role-delete')
                                         
                                            {!! Form::open(['method' => 'DELETE','route' => ['business.destroy',
                                                                $role->id],'style'=>'display:inline']) !!}          
                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn copy', 'title' => 'Delete']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                            </div>
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