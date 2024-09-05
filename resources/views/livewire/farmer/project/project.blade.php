<div>
    <div class="container">
        <h2 class="mt-4 mb-4">Crop Projects</h2>

        {{--  <!-- add new crop project -->  --}}
        <div class="text-right mb-3">
            <a href="{{ route('farmer.cropproject.add') }}" class="btn btn-success" role="button" wire:navigate>Add New
                Crop Project</a>
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
                            <td><a href="{{ route('farmer.cropproject.show', ['id' => $cropproject->id]) }}"
                                    wire:navigate><b>{{ $cropproject->project_name }}</b></a></td>
                            <td>{{ $cropproject->launch_date }}</td>
                            <td>{{ $cropproject->end_date }}</td>
                            <td>{{ $cropproject->farm_size }}</td>
                            <td>{{ $cropproject->corp_quality }}</td>
                            <td>
                                {{-- View Icon --}}
                                <a href="{{ route('farmer.cropproject.show', ['id' => $cropproject->id]) }}"
                                    class="btn btn-info" title="View" wire:navigate>
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                {{-- Edit Icon --}}
                                <a href="{{ route('farmer.cropproject.edit', ['id' => $cropproject->id]) }}"
                                    class="btn btn-primary" title="Edit" wire:navigate>
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete Icon --}}
                                <button wire:click="deleteProject({{ $cropproject->id }})" class="btn btn-sm"
                                    style="background-color: #ff0000; color: #ffffff;" title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this crop project?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
