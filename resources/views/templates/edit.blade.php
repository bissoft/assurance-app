@extends('layouts.app')


@section('content')

<div class="container-fluid">
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8"> Group</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page"> Group Edit</li>
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
                        {!! Form::model($group, ['method' => 'PATCH','route' => ['groups.update', $group->id]])
                !!}
                <div class="card-body">
                                    <h5> Templates Edit</h5>
                                   
                                   
                                    <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                         
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <div class="row m-auto">
                                        <div class="col-12">
                                            <div class="mb-3">
                                            {{Form::label('name',__('Custom Field Name'),['class'=>'form-control-label'])}}
                                            {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                            {{ Form::label('type', __('Type'),['class'=>'form-control-label']) }}
                                            {{ Form::select('type',$types,null, array('class' => 'form-control select2 selectBox','required'=>'required')) }}
                                            </div>
                                        </div>
                                        <div class="col-12 option" style="display:none;">
                                            <div class="mb-3">
                                              <label class="form-control-label">Option</label>
                                              <div id="inputContainer"></div>
                                              <!-- <input type="text" name="options[]" id="myInput" class="form-control" value="0"/> -->
                                              <button type="button" id="incrementButton" class="btn btn-primary">+</button>
                                              <button type="button" id="decrementButton" class="btn btn-danger">-</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                            {{ Form::label('Business Type', __('Business Type'),['class'=>'form-control-label']) }}
                                            {{ Form::select('module',$modules,null, array('class' => 'form-control select2 ','required'=>'required')) }}
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
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    
      $('.selectBox').on('change', function() {
        var value = $(this).val();
        if(value=='select'){
            $('.option').css('display', '');

        }else{
            $('.option').css('display', 'none');
        }
        console.log('Input value changed: ' + value);
        // Perform additional actions based on the changed value
      });
    });
</script>
<script>
    $(document).ready(function() {
      var fieldCount = 0;

      $('#incrementButton').on('click', function() {
        fieldCount++;
        var newInput = $('<input type="text" name="options[]" class="form-control dynamicInput" id="inputField' + fieldCount + '">');
        $('#inputContainer').append(newInput);
      });

      $('#decrementButton').on('click', function() {
        if (fieldCount > 0) {
          $('#inputField' + fieldCount).remove();
          fieldCount--;
        }
      });
    });
</script>
@endsection