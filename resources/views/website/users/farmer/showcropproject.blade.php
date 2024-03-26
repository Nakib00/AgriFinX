@extends('website.users.farmer.deashboad')
@section('agriofficer.dashboard')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Crop Project Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Project Name:</strong> {{ $cropproject->project_name }}
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong> {{ $cropproject->description }}
                        </div>
                        <div class="mb-3">
                            <strong>Launch Date:</strong> {{ $cropproject->launch_date }}
                        </div>
                        <div class="mb-3">
                            <strong>End Date:</strong> {{ $cropproject->end_date }}
                        </div>
                        <div class="mb-3">
                            <strong>Farm Size:</strong> {{ $cropproject->farm_size }}
                        </div>
                        <div class="mb-3">
                            <strong>Crop Quality:</strong> {{ $cropproject->corp_quality }} KG
                        </div>
                        <div class="mb-3">
                            <strong>Pesticide Cost:</strong> {{ $cropproject->pesticide_cost }} TK
                        </div>
                        <div class="mb-3">
                            <strong>Labour Cost:</strong> {{ $cropproject->labour_cost }} TK
                        </div>

                        <div class="mb-3">
                            <strong>Total expance:</strong>
                            {{ $cropproject->labour_cost + $cropproject->pesticide_cost }} TK
                        </div>
                        <div class="mb-3">
                            <strong>Funding Status:</strong> {{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}
                        </div>
                        <div class="mb-3">
                            <strong>Created At:</strong> {{ $cropproject->created_at }}
                        </div>
                        <div class="mb-3">
                            <strong>Updated At:</strong> {{ $cropproject->updated_at }}
                        </div>
                        {{--  <!-- Back button -->  --}}
                        <a href="{{ route('farmer.cropproject') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
