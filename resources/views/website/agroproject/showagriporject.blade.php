@extends('website.layout.webpage')

@section('content')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
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
                                <strong>Crop Quality:</strong> {{ $cropproject->corp_quality }}
                            </div>
                            <div class="mb-3">
                                <strong>Pesticide Cost:</strong> {{ $cropproject->pesticide_cost }}
                            </div>
                            <div class="mb-3">
                                <strong>Labour Cost:</strong> {{ $cropproject->labour_cost }}
                            </div>

                            <div class="mb-3">
                                <strong>Total expance:</strong>
                                {{ $cropproject->labour_cost + $cropproject->pesticide_cost }}
                            </div>

                            <div class="mb-3">
                                <strong>Funding Status:</strong>
                                {{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}
                            </div>

                            <div class="mb-3">
                                <strong>Farmer:</strong> <a href="#">{{ $cropproject->farmer->f_name }}
                                    {{ $cropproject->farmer->l_name }}</a>
                            </div>
                            <div class="mb-3">
                                <strong>Crop:</strong> {{ $cropproject->crop->name }}
                            </div>
                            <div class="mb-3">
                                <strong>Created At:</strong> {{ $cropproject->created_at }}
                            </div>
                            <div class="mb-3">
                                <strong>Updated At:</strong> {{ $cropproject->updated_at }}
                            </div>
                            {{--  <!-- Back button -->  --}}
                            <a href="{{ route('agropindex') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
