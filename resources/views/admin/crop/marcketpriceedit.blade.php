@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        <h3>Edit Crop Marcker price</h3>
        <div class="modal-content">
            <div class="modal-body">
                {{--  <!-- Edit Form -->  --}}
                <form action="{{ route('crop.marcketprice.edit', ['id' => $cropMarketPrice->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cropName">Crop Name</label>
                        <input type="text" class="form-control" id="cropName" name="cropname"
                            value="{{ $cropMarketPrice->crop->name }}" placeholder="Enter Crop Name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Current Price 1kg</label>
                        <input type="number" class="form-control" name="Current_Price"
                            value="{{ $cropMarketPrice->Current_Price }}" id="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Date</label>
                        <input type="date" class="form-control" name="price_date"
                            value="{{ $cropMarketPrice->price_date }}" id="endDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <a href="{{ route('crop.marcketprice') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
