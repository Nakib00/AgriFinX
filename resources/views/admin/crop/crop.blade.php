@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        {{--  <!-- Add Button -->  --}}
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Crop</button>

        {{--  <!-- Table -->  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Cultivation Start Time</th>
                    <th>Cultivation End Time</th>
                    <th>Current Price</th>
                    <th>price Date</th>
                    <th>Action</th>
                    <th>Marcket price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crops as $crop)
                    <tr>
                        <td>{{ $crop->name }}</td>
                        <td>{{ $crop->cultavation_start }}</td>
                        <td>{{ $crop->Current_Price }}</td>
                        <td>{{ $crop->price_date }}</td>
                        <td>
                            {{-- Edit Icon with data-toggle for modal --}}
                            <a href="{{ route('crop.editpage', ['id' => $crop->id]) }}" class="edit-btn">
                                <i class="fas fa-edit mr-2"></i>
                            </a>
                            {{--  Delete  --}}
                            <form action="{{ route('crop.delete', ['id' => $crop->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link action-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('crop.marcketprice.editpage', ['id' => $crop->id]) }}" class="edit-btn">
                                <i class="fas fa-edit mr-2"></i>
                            </a>
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
                    <h5 class="modal-title" id="addModalLabel">Add Crop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--  <!-- Add Form -->  --}}
                    <form action="{{ route('crop.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cropName">Crop Name</label>
                            <input type="text" class="form-control" id="cropName" name="cropname"
                                placeholder="Enter Crop Name">
                        </div>
                        <div class="form-group">
                            <label for="startDate">Cultivation Start Date</label>
                            <input type="date" class="form-control" name="scultivation" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="endDate">Cultivation End Date</label>
                            <input type="date" class="form-control" name="ecultivation" id="endDate">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
