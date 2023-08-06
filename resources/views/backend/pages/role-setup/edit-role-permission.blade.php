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

                                        <h6 class="card-title">Edit Roles In Permission</h6>

                                        <form class="forms-sample mt-3" method="POST" action="{{route('admin.update.role', $roles->id)}}" id="myForm">
                                                @csrf
                                                <div class="form-group mb-3">
                                                        <label for="amenitie_name" class="form-label">Role Name</label>
                                                        <h3>{{ $roles->name }}</h3>                                                   
                                                </div>
                                                <div class="form-check mb-2">
                                                        <input type="checkbox" class="form-check-input" name="" id="checkDefaultmain">
                                                        <label for="checkDefaultmain" class="form-check-label">Permission All</label>
                                                </div>

                                                <hr>
                                                @foreach ($permission_groups as $group)

                                                <div class="row">
                                                        <div class="col-3">
                                                                @php
                                                                        $permissions = App\Models\User::getPermissionGroupName($group->group_name);
                                                                @endphp
                                                                <div class="form-check mb-2">
                                                                        <input type="checkbox" class="form-check-input" name="" id="checkDefault" {{App\Models\User::roleHasPermissions($roles,$permissions) ? 'checked' : ''}}>
                                                                        <label for="checkDefault" class="form-check-label">{{$group->group_name}}</label>
                                                                </div>  
                                                        </div>
                                                        <div class="col-9">
                                                                
                                                                @foreach ($permissions as $permission)
                                                                <div class="form-check mb-2">
                                                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{$permission->id}}" value="{{$permission->id}}" {{$roles->hasPermissionTo($permission->name) ? 'checked' : ''}}>
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

<script>
        $('#checkDefaultmain').click(function(){
                if ($(this).is(':checked')) {
                        $('input[type=checkbox]').prop('checked', true)
                }else{
                        $('input[type=checkbox]').prop('checked', false)

                }
        })
</script>

@endsection