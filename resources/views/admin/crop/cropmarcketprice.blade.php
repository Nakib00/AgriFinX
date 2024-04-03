@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        {{--  <!-- Add Button -->  --}}
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Crop Marcket
            price</button>

        {{--  <!-- Table -->  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Current Price 1kg</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cropMarketPrices as $cropMarketPrice)
                    <tr>
                        <td>{{ $cropMarketPrice->crop_name }}</td>
                        <td>{{ $cropMarketPrice->Current_Price }}</td>
                        <td>{{ $cropMarketPrice->price_date }}</td>
                        <td>
                            {{-- Edit Icon with data-toggle for modal --}}
                            <a href="{{ route('crop.marcketprice.editpage', ['id' => $cropMarketPrice->id]) }}"
                                class="edit-btn"><i class="fas fa-edit mr-2"></i></a>
                            {{--  Delete  --}}
                            <form action="{{ route('crop.marcketprice.delete', ['id' => $cropMarketPrice->id]) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link action-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{--  <!-- Add Modal -->  --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Crop Price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--  <!-- Add Form -->  --}}
                    <form action="{{ route('crop.marcketprice.store', ['id' => $crop->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cropName">Crop Name</label>
                            <select class="form-control" id="cropName" name="cropid">
                                <option value="">Select Crop Name</option>
                                @foreach ($crop as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="startDate">Current Price 1kg</label>
                            <input type="number" class="form-control" name="currentprice" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="endDate">priceing Date</label>
                            <input type="date" class="form-control" name="pricingdate" id="endDate">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
