@extends('admin.admin-dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
        <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                        <a href="{{route('export.permission')}}" class="btn btn-inverse-danger">Xlsx Download</a> 
                </ol>
        </nav>
        <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                        <div class="card">
                                <div class="card-body">

                                        <h6 class="card-title">Import Permission</h6>

                                        <form class="forms-sample mt-3" method="POST" action="{{route('import.store.permission')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                        <label for="amenitie_name" class="form-label">Xlsx File Import</label>
                                                        <input type="file" class="form-control" name="import_file">
                                                        
                                                </div>
                                                <button type="submit" class="btn btn-inverse-warning">Upload</button>
                                        </form>
                                </div>
                        </div>
                </div>
          </div>
          <!-- middle wrapper end -->
        </div>
</div>


@endsection