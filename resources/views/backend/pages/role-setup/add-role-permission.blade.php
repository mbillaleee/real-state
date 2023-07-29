@extends('admin.admin-dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
        <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                        <div class="card">
                                <div class="card-body">

                                        <h6 class="card-title">Add Roles In Permission</h6>

                                        <form class="forms-sample mt-3" method="POST" action="{{route('store.role.permission')}}" id="myForm">
                                                @csrf
                                                <div class="form-group mb-3">
                                                        <label for="amenitie_name" class="form-label">Role Name</label>
                                                        <select name="role_id" id="" class="form-control">
                                                                <option value="" disable>Select Group</option>
                                                                @foreach ($roles as $role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                                @endforeach
                                                        </select>                                                    
                                                </div>
                                                <div class="form-check mb-2">
                                                        <input type="checkbox" class="form-check-input" name="" id="checkDefault">
                                                        <label for="checkDefault" class="form-check-label">Permission All</label>
                                                </div>

                                                <hr>
                                                @foreach ($permission_groups as $group)

                                                <div class="row">
                                                        <div class="col-3">
                                                                <div class="form-check mb-2">
                                                                        <input type="checkbox" class="form-check-input" name="" id="checkDefault">
                                                                        <label for="checkDefault" class="form-check-label">{{$group->group_name}}</label>
                                                                </div>  
                                                        </div>
                                                        <div class="col-9">
                                                                @php
                                                                    $permissions = App\Models\User::getPermissionGroupName($group->group_name);
                                                                @endphp
                                                                @foreach ($permissions as $permission)
                                                                <div class="form-check mb-2">
                                                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{$permission->id}}" value="{{$permission->id}}">
                                                                        <label for="checkDefault{{$permission->id}}" class="form-check-label">{{$permission->name}}</label>
                                                                </div>
                                                                @endforeach
                                                                <br><br>
                                                        </div>
                                                </div>  {{-- end row --}}
                                                @endforeach
                                                
                                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        </form>

                                </div>
                        </div>
                </div>
          </div>
          <!-- middle wrapper end -->
        </div>
</div>


@endsection