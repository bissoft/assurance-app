@extends('layouts.app')


@section('content')
<div class="container-fluid">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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
                <!--  Owl carousel -->





                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Build a Template</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            Build a Template
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Row 1 -->
                <div class="form_template">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn theme_colors_btn mb-3 " data-bs-toggle="modal"
                                data-bs-target="#exampleModalsection">
                                <i class="fas fa-plus"></i>
                                <span> Add New Section</span>
                            </button>


                            


                        </div>
                    </div>
                </div>
                @if($customFields)
                 @foreach($customFields as $cus)
                <div class="table-responsive-lg  template_form_box template_form_box_inputfield">
                
                    <h3>{{$cus->name}}</h3>
                    <table class="sortable-table">
                        <tbody>
                            <input type="hidden" value="{{$groups->name}}" id="bsuiness_id"/>
                        @if($cus->customField)
                                @foreach($cus->customField as $customField)    
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
                                                                <a class="copy " type="button" href="{{route('custom-field.edit',$customField->id)}}" ><i
                                                                        class="fas fa-pen"></i></a>
                                                                <a class="copy" href="{{ route('custom-field.duplicate',$customField->id) }}"><i class="far fa-copy"></i></a>
                                                                
                                                                {!! Form::open(['method' => 'DELETE','route' => ['custom-field.destroy',
                                                                $customField->id],'style'=>'display:inline']) !!}
                                                                
                                                                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn copy', 'title' => 'Delete']) !!}
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
                    <div class="d-flex justify-content-end align-items-center">
                        <button class="btn btn-primary mb-3 " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{$cus->id}}">
                                    <i class="fas fa-plus"></i>
                                    <span> Add New field row</span>
                                </button>
                    </div>
                </div>
                @endforeach
                @endif




            </div>

<!-- Modal -->
@if($customFields)
@foreach($customFields as $cus)
<div class="modal fade" id="exampleModal{{$cus->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            {{Form::hidden('section_id',$cus->id,array('class'=>'form-control','required'=>'required'))}}
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
                                        <div class="col-12" style="display:none;">
                                            <div class="mb-3">
                                            {{ Form::label('Business Type', __('Business Type'),['class'=>'form-control-label']) }}
                                            <select class="form-control select2" name="module_id">
                                                @foreach($modules as $e)  
                                                <option value="{{$e->id}}" @if($e->id==$groups->id) selected @endif>{{$e->name}}</option>
                                                @endforeach
                                            </select>
                                           
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

@endforeach
@endif
<!--Section Modal -->
<div class="modal fade" id="exampleModalsection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
                        {!! Form::open(array('route' => 'section.store','method'=>'POST')) !!}
                                <div class="card-body">
                                    <h5> Section Create</h5>
                                   
                                   
                                    <div class="d-md-flex align-items-center">
                                        <div class="action-form">
                                         
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <div class="row m-auto">
                                        <div class="col-12">
                                            <div class="mb-3">
                                            {{Form::label('name',__('Section Name'),['class'=>'form-control-label'])}}
                                            {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
                                            {{Form::hidden('template_id',$id,array('class'=>'form-control','required'=>'required'))}}
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
<!--  -->

<!--Edit Modal -->
<div class="modal fade contact_modal_design" id="exampleModaleditrow" tabindex="-1"
        aria-labelledby="exampleModaleditrowLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Row</h3>

                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="  ">
                        {!! Form::model(null, ['method' => 'PATCH','route' => ['business.update', $groups->id]])
                !!}
                                <div class="row" id="forms_row">
                                    <div class="col-12   mb-3">
                                        <label>Title</label>
                                        <input type="text " class="form-control">
                                    </div>
                                    <div class="col-12  mb-3">
                                        <label>Type</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Email</option>
                                            <option value="2">Text</option>
                                            <option value="3">Number</option>
                                            <option value="3">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-12   mb-3" style="display:none;">
                                    {{ Form::label('Business Type', __('Business Type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('module',$modules,$groups->name, array('class' => 'form-control select2 ','required'=>'required')) }}
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script>
        $(document).ready(function () {
            var max_fields = 10;
            var wrapper = $(".template_form_box");
            var add_button = $(".add_form_field");

            var x = 1;
            $(add_button).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        ' <div class="row " id = "forms_row">  <div class="col-md-4 mb-3" >    <h4>Carrier</h4>  <input type="text " class="form-control">    </div> <div class="col-md-4 mb-3" >  <h4>type</h4>  <input type="text " class="form-control">   </div>   <div class="col-md-4   my-auto"> <div class="d-flex justify-content-center align-items-center">    <button  class="copy"><i class="far fa-copy"></i></button>  <button   class="trash delete"><i class="fas fa-trash-alt"></i></button>  </div>   </div>  </div>'
                        ); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".delete", function (e) {
                e.preventDefault();

                $(this).attr("id");
                $('#forms_row').remove();


                x--;
            })
        });
</script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
    
        $(".sortable-table>tbody").sortable({
          
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
            url: "{{ url('customfield-sortable') }}",
                data: {
                    order: order,
                    business_id: $('#bsuiness_id').val(),
                    _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                    toastr.success('success','Swap the rows.');
                } else {
                  console.log(response);
                }
            }
          });
        }
      
    </script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
            var userId = $(this).data('id');
            
            // Perform any additional actions here, such as fetching user data using AJAX

            // Open the modal
            $('#exampleModaleditrow').modal('show');
            });
        });
    </script>

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