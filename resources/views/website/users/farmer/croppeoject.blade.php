@extends('website.users.farmer.deashboad')
@section('agriofficer.dashboard')
    <div class="container">
        <h2 class="mt-4 mb-4">Crop Projects</h2>

        {{--  <!-- add new crop project -->  --}}
        <div class="text-right mb-3">
            <a href="{{ route('farmer.cropproject.add') }}" class="btn btn-success" role="button">Add New Crop Project</a>
        </div>
        {{--  Table  --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Project Name</th>
                        <th>Launch Date</th>
                        <th>End Date</th>
                        <th>Farm Size</th>
                        <th>Crop Quality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Project 1</td>
                        <td>2022-03-01</td>
                        <td>2022-06-30</td>
                        <td>10 acres</td>
                        <td>High</td>
                        <td>
                            <!-- View Icon -->
                            <a href="#" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="btn btn-primary btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Project 2</td>
                        <td>2022-04-15</td>
                        <td>2022-09-30</td>
                        <td>15 acres</td>
                        <td>Medium</td>
                        <td>
                            {{--  <!-- View Icon -->  --}}
                            <a href="#" class="btn btn-info btn-sm" title="View">
                                <i class="far fa-eye"></i>
                            </a>
                            {{--  <!-- Edit Icon -->  --}}
                            <a href="#" class="btn btn-primary btn-sm" title="Edit">
                                <i class="far fa-edit"></i>
                            </a>
                            {{--  <!-- Delete Icon -->  --}}
                            <a href="#" class="btn btn-danger btn-sm" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
