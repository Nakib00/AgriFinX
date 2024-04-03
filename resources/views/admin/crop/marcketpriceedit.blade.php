@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        <h3>Add Crop Current Marcket price</h3>
        <div class="modal-content">
            <div class="modal-body">
                {{--  <!-- Edit Form -->  --}}
                <form action="{{ route('crop.marcketprice.edit', ['id' => $crop->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cropName">Crop Name</label>
                        <input type="text" class="form-control" id="cropName" name="cropname" value="{{ $crop->name }}"
                            placeholder="Enter Crop Name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="startDate"> Current Price</label>
                        <input type="text" class="form-control" name="Current_Price" value="{{ $crop->Current_Price }}" id="startDate"
                            placeholder="Enter Current Price">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Price Date</label>
                        <input type="date" class="form-control" name="price_date" value="{{ $crop->price_date }}" id="endDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <a href="{{ route('crop') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
