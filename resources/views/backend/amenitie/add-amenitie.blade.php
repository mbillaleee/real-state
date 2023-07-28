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

                        <form class="forms-sample mt-3" method="POST" action="{{route('store.amenitie')}}">
                                @csrf
                                <div class="mb-3">
                                        <label for="amenitie_name" class="form-label">Amenitie Name</label>
                                        <input type="text" class="form-control @error('amenitie_name') is-invalid @enderror" id="amenitie_name" name="amenitie_name">
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

@endsection