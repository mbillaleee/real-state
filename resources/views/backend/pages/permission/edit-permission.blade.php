@extends('admin.admin-dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
        <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                        <a href="{{route('all.permission')}}" class="btn btn-inverse-info ">Back</a>
                </ol>
            </nav>
                <div class="row">
                        <div class="card">
                                <div class="card-body">

                                        <h6 class="card-title">Edit Permission</h6>

                                        <form class="forms-sample mt-3" method="POST" action="{{route('update.permission', $permission->id)}}" id="myForm">
                                                @csrf
                                                <input type="hidden" name="id" id="" value="{{ $permission->id }}">
                                                <div class="form-group mb-3">
                                                        <label for="amenitie_name" class="form-label">Permission Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                                                        
                                                </div>
                                                <div class="form-group mb-3">
                                                        <label for="amenitie_name" class="form-label">Group Name</label>
                                                        <select name="group_name" id="" class="form-control">
                                                                <option value="" disabled>Select Group</option>
                                                                <option value="type" {{$permission->group_name == 'type' ? 'selected' : ''}}>Property Type</option>
                                                                <option value="state" {{$permission->group_name == 'state' ? 'selected' : ''}}>State</option>
                                                                <option value="amenities" {{$permission->group_name == 'amenities' ? 'selected' : ''}}>Amenities</option>
                                                                <option value="property" {{$permission->group_name == 'property' ? 'selected' : ''}}>Property</option>
                                                                <option value="history" {{$permission->group_name == 'history' ? 'selected' : ''}}>Package History</option>
                                                                <option value="message" {{$permission->group_name == 'message' ? 'selected' : ''}}>Property Message</option>
                                                                <option value="testimonials" {{$permission->group_name == 'testimonials' ? 'selected' : ''}}>Testimonials</option>
                                                                <option value="agent" {{$permission->group_name == 'agent' ? 'selected' : ''}}>Manage Agent</option>
                                                                <option value="category" {{$permission->group_name == 'category' ? 'selected' : ''}}>Blog Category</option>
                                                                <option value="comment" {{$permission->group_name == 'comment' ? 'selected' : ''}}>Blog Comment</option>
                                                                <option value="smtp" {{$permission->group_name == 'smtp' ? 'selected' : ''}}>SMTP Setting</option>
                                                                <option value="site" {{$permission->group_name == 'site' ? 'selected' : ''}}>Site Setting</option>
                                                                <option value="role" {{$permission->group_name == 'role' ? 'selected' : ''}}>Role & Permission</option>
                                                        </select>                                                    
                                                </div>
                                                <button type="submit" class="btn btn-primary me-2">Update</button>
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