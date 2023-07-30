@extends('admin.admin-dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
        <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card-body">

                        <h6 class="card-title">Add Admin</h6>

                        <form class="forms-sample mt-3" method="POST" action="{{route('store.admin')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="username" autocomplete="off" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off" placeholder="Enter Name">
                                </div>
                                <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputUsername1" name="email" autocomplete="off" placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="phone" autocomplete="off" placeholder="Enter Phone">
                                </div>
                                <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="address" autocomplete="off" placeholder="Enter Address">
                                </div>
                                <div class="mb-3">
                                        <label for="photo" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="imageInput" name="photo">
                                </div>

                                <div class="mb-3">
                                        <label for="photo" class="form-label">Admin Password</label>
                                        <input type="password" class="form-control" id="imageInput" name="password" placeholder="Enter Password">
                                </div>
                                <div class="mb-3">
                                        <label for="photo" class="form-label">Role Name</label>
                                        <select name="roles" id="" class="form-control">
                                                <option value="" disable>Select Role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                        </select>  
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                        </form>

</div>
            </div>
          </div>
          <!-- middle wrapper end -->
        </div>
</div>


<script type="text/javascript">
        $(document).ready(function(){
                $('#imageInput').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                                $('#displayedImage').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                });
        });
</script>

@endsection