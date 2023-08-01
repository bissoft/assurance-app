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
                                <h4 class="fw-semibold mb-8"> Form Builder</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page"> Form</li>
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
                
                <!--  Row 1 -->
                <div class="form_template">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn theme_colors_btn mb-3 " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                <span> Add New field row</span>
                            </button>


                            


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- ---------------------
                                          start Event Registration
                                      ---------------- -->
                        <div class="card">
                        <!-- {!! Form::open(array('route' => 'template.store','method'=>'POST')) !!} -->
                                <div class="card-body">
                                    <h5> Form Template</h5>
                                   
                                   
                                    <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                         
                                        </div>
                                        
                                    </div>
                                </div>
                                {{--<div class="card-body border-top">
                                    @if($customFields)
                                        @foreach($customFields as $customField)
                                            @if($customField->type == 'text')
                                                
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    {{ Form::text('customField['.$customField->id.']', null, array('class' => 'form-control')) }}
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                            
                                            
                                            @elseif($customField->type == 'email')
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    {{ Form::email('customField['.$customField->id.']', null, array('class' => 'form-control')) }}
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                        <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($customField->type == 'number')
                                                
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    {{ Form::number('customField['.$customField->id.']', null, array('class' => 'form-control')) }}
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                        <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($customField->type == 'date')
                                                
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    {{ Form::date('customField['.$customField->id.']', null, array('class' => 'form-control')) }}
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                        <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($customField->type == 'textarea')
                                                
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    {{ Form::textarea('customField['.$customField->id.']', null, array('class' => 'form-control')) }}
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                        <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            
                                            @elseif($customField->type == 'select')
                                                <div class="row"  id = "forms_row">
                                                    <div class="col-md-8 " >
                                                    {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-control-label']) }}
                                                    <div class="input-group">
                                                        @php $value=json_decode($customField->options, true); @endphp
                                                        <select class="form-control">
                                                        @foreach($value as $options)
                                                        <option>{{$options}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4   my-auto">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                        <a class="copy btn btn-primary" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                            
                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete']) !!}
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    </div>--}}

                                <!--  -->
                                <div class="table-responsive-lg  template_form_box template_form_box_inputfield">
                                    <table class="sortable-table" id="table">
                                        <tbody id="tablecontents">
                                            @if($customFields)
                                            @foreach($customFields as $customField)    
                                                <tr class="row1" data-id="{{ $customField->id }}">
                                                    <td>
                                                        <table class="collapsible-table">
                                                            <tbody>
                                                                <tr class="base-row">

                                                                    <td class="sortable-table_firsthead">
                                                                        <h4>{{$customField->name}}</h4>
                                                                    </td>

                                                                    <td> <input type="text " class="form-control" placeholder="{{$customField->type}}" readOnly> </td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                            <button class="copy" type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModaleditrow"><i
                                                                                    class="fas fa-pen"></i></button>
                                                                            <a class="copy" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                                            
                                                                            {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy', $customField->id],'style'=>'display:inline']) !!}
                                                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'trash delete', 'title' => 'Delete']) !!}
                                                                            {!! Form::close() !!}        

                                                                            <!-- Button trigger modal -->


                                                                        </div>
                                                                    </td>

                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endforeach    
                                            @endif   
                                            
                                        </tbody>
                                    </table>

                                </div>
                                <!--  -->
                                <!-- <div class="p-3 border-top">
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
                                </div> -->
                            <!-- {!! Form::close() !!} -->
                        </div>
                        <!-- ---------------------
                                          end Event Registration
                                      ---------------- -->
                    </div>
                </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
                        {!! Form::open(array('route' => 'custom-field.store','method'=>'POST')) !!}
                                <div class="card-body">
                                    <h5> Templates Create</h5>
                                   
                                   
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
                                                    class="btn btn-dark rounded-pill px-4 waves-effect waves-light" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                        {!! Form::close() !!}
                        </div>
        
      </div>
      
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $("#table").DataTable();

        $( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer();
          }
        });

        function sendOrderToServer() {
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });

          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ url('/') }}",
                data: {
              order: order,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
@endsection  