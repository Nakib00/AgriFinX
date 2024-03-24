@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        <h3>Edit Crop</h3>
        <div class="modal-content">
            <div class="modal-body">
                {{--  <!-- Edit Form -->  --}}
                <form action="{{ route('crop.edit', ['id' => $crop->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cropName">Crop Name</label>
                        <input type="text" class="form-control" id="cropName" name="cropname" value="{{ $crop->name }}"
                            placeholder="Enter Crop Name">
                    </div>
                    <div class="form-group">
                        <label for="startDate">Cultivation Start Date</label>
                        <input type="date" class="form-control" name="scultivation"
                            value="{{ $crop->cultavation_start }}" id="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Cultivation End Date</label>
                        <input type="date" class="form-control" name="ecultivation" value="{{ $crop->cultavation_end }}"
                            id="endDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <a href="{{ route('crop') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
