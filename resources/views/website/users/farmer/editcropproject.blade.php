@extends('website.users.farmer.layout.farmerlayout')

@section('agriofficer.dashboard')
    <div class="container mb-2">
        <h2 class="mt-4 mb-4">Edit Crop Project</h2>
        <form action="{{ route('farmer.cropproject.update', $cropproject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" class="form-control" id="project_name" name="project_name"
                    value="{{ $cropproject->project_name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $cropproject->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="corp_name">Crop Name:</label>
                <select class="form-control" id="corp_name" name="crop_id" required>
                    @foreach ($crop as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $cropproject->crop_id) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="launch_date">Launch Date:</label>
                <input type="date" class="form-control" id="launch_date" name="launch_date"
                    value="{{ $cropproject->launch_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                    value="{{ $cropproject->end_date }}" required>
            </div>
            <div class="form-group">
                <label for="farm_size">Farm Size:</label>
                <input type="text" class="form-control" id="farm_size" name="farm_size"
                    value="{{ $cropproject->farm_size }}" required>
            </div>
            <div class="form-group">
                <label for="corp_quality">Crop Quality kg:</label>
                <input type="text" class="form-control" id="corp_quality" name="corp_quality"
                    value="{{ $cropproject->corp_quality }}" required>
            </div>
            <div class="form-group">
                <label for="pesticide_cost">Pesticide Cost:</label>
                <input type="number" class="form-control" id="pesticide_cost" name="pesticide_cost"
                    value="{{ $cropproject->pesticide_cost }}" required>
            </div>
            <div class="form-group">
                <label for="labour_cost">Labour Cost:</label>
                <input type="number" class="form-control" id="labour_cost" name="labour_cost"
                    value="{{ $cropproject->labour_cost }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        {{--  <!-- Back button -->  --}}
        <a href="{{ route('farmer.cropproject') }}" class="btn btn-secondary mt-2">Back</a>
    </div>
@endsection
