@extends('website.users.farmer.layout.farmerlayout')
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
                    @foreach ($cropprojects as $cropproject)
                        <tr>
                            <td><a
                                    href="{{ route('farmer.cropproject.show', ['id' => $cropproject->id]) }}"><b>{{ $cropproject->project_name }}</b></a>
                            </td>
                            <td>{{ $cropproject->launch_date }}</td>
                            <td>{{ $cropproject->end_date }}</td>
                            <td>{{ $cropproject->farm_size }}</td>
                            <td>{{ $cropproject->corp_quality }}</td>
                            <td>
                                {{-- View Icon --}}
                                <a href="{{ route('farmer.cropproject.show', ['id' => $cropproject->id]) }}"
                                    class="btn btn-info" title="View">
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- Edit Icon --}}
                                <a href="{{ route('farmer.cropproject.edit', ['id' => $cropproject->id]) }}"
                                    class="btn btn-primary" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                {{-- Delete Icon --}}
                                <form action="{{ route('farmer.deleteproject.update', ['id' => $cropproject->id]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background-color: #ff0000; color: #ffffff;"
                                        title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this crop project?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
