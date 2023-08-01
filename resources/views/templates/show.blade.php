@extends('layouts.app')


@section('content')
<div class="container-fluid">

            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <h4 class="fw-semibold mb-8"> Team List</h4>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a class="text-muted" href="dashboard.html">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item" aria-current="page">Team  </li>
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
                        <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                         
                                        </div>
                                        <div class="ms-auto">
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
                                                
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                            <div class="mb-2">
                                <h5 class="mb-3">Team List</h5>
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
                                    @foreach ($groups as $key => $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->user->name }}</td>
                                        <td>
                                           
                                            
                                            @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['team.destroy',
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
        <!--  -->
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('team.store')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$id}}" name="group_id" />
            <label for="exampleFormControlInput1" class="form-label">Users:</label>
            <select class="form-control" id="exampleFormControlInput1" name="user_id">
                <option>Select user</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection        