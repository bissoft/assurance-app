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
                                <h4 class="fw-semibold mb-8"> Custom</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page"> Custom Field Edit</li>
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
                        
                        {!! Form::model($customField, ['method' => 'PATCH','route' => ['custom-field.update', $customField->id]])
                !!}
                                <div class="card-body">
                                    <h5> Custom Field Edit</h5>
                                   
                                   
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
                                        <div class="col-12" style="display:none;">
                                            <div class="mb-3">
                                            {{ Form::label('Business Type', __('Business Type'),['class'=>'form-control-label']) }}
                                            <select class="form-control select2" name="module_id">
                                                @foreach($modules as $e)  
                                                <option value="{{$e->id}}" @if($e->id==$customField->module_id) selected @endif>{{$e->name}}</option>
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
                        <!-- ---------------------
                                          end Event Registration
                                      ---------------- -->
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