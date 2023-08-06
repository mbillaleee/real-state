@extends('admin.admin-dashboard')

@section('admin')
        <div class="page-content">

                <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                                <a href="{{route('add.role')}}" class="btn btn-inverse-info ">Add Role</a> &nbsp;&nbsp;&nbsp;
                                <a href="{{route('import.permission')}}" class="btn btn-inverse-warning">Import</a> &nbsp;&nbsp;&nbsp;
                                <a href="{{route('export.permission')}}" class="btn btn-inverse-danger">Export</a> 
                        </ol>
                </nav>

                <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                <div class="card-body">
                                        <h6 class="card-title">All Roles Permission</h6>
                                        <div class="table-responsive">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                                <th>SL</th>
                                                <th>Role Name</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($roles as $key => $item)
                                        <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                        @foreach ($item->permissions as $perm)
                                                        <span class="badge bg-danger">{{ $perm->name }}</span>
                                                        @endforeach
                                                </td>
                                                <td>
                                                        <a href="{{route('admin.edit.role', $item->id)}}" class="btn btn-inverse-warning">Edit</a>
                                                        <a href="{{route('admin.delete.role', $item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
                                                </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                        </div>
                                </div>
                                </div>
                        </div>
                </div>

	</div>
@endsection