@extends('admin.admin-dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
        <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                <div class="card-body">

                        <h6 class="card-title">Add Amenities</h6>

                        <form class="forms-sample mt-3" method="POST" action="{{route('update.amenitie', $amenitie->id)}}" id="myForm">
                                @csrf
                                <div class="form-group mb-3">
                                        <input type="hidden" name="id" id="" value="{{$amenitie->id}}">
                                        <label for="amenitie_name" class="form-label">Amenitie Name</label>
                                        <input type="text" class="form-control" name="amenitie_name" value="{{$amenitie->amenitie_name}}">
                                        @error('amenitie_name')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>

</div>
            </div>
        </div>
          </div>
          <!-- middle wrapper end -->
        </div>
</div>


<script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    amenitie_name: {
                        required : true,
                    }, 
                    
                },
                messages :{
                     amenitie_name: {
                        required : 'Please Enter Amenitie Name',
                    }, 
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>
@endsection