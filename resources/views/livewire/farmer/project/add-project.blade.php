<div class="container mb-2">
    <h2 class="mt-4 mb-4">Add New Crop Project</h2>

    <!-- Flash message for success -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" class="form-control" id="project_name" wire:model="project_name" required>
            @error('project_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" wire:model="description" rows="3" required></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="crop_name">Crop Name:</label>
            <select class="form-control" wire:model="crop_id" required>
                <option value="">Select an option</option>
                @foreach ($crop as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('crop_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="launch_date">Launch Date:</label>
            <input type="date" class="form-control" id="launch_date" wire:model="launch_date" required>
            @error('launch_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" wire:model="end_date" required>
            @error('end_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="farm_size">Farm Size:</label>
            <input type="text" class="form-control" id="farm_size" wire:model="farm_size" required>
            @error('farm_size')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="corp_quality">Crop Quality (kg):</label>
            <input type="text" class="form-control" id="corp_quality" wire:model="corp_quality" required>
            @error('corp_quality')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pesticide_cost">Pesticide Cost:</label>
            <input type="number" class="form-control" id="pesticide_cost" wire:model="pesticide_cost" required>
            @error('pesticide_cost')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="labour_cost">Labour Cost:</label>
            <input type="number" class="form-control" id="labour_cost" wire:model="labour_cost" required>
            @error('labour_cost')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
