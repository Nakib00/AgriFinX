@extends('website.users.investor.deashboad')
@section('agriofficer.dashboard')
    <section class="" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
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
                                <strong>Funding Status:</strong>
                                {{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}
                            </div>

                            <div class="mb-3">
                                <strong>Farmer:</strong>
                                <a href="#" data-toggle="modal"
                                    data-target="#farmerModal">{{ $cropproject->farmer->f_name }}
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
                            <a href="{{ route('investor.cropproject.show') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  show farmer info  --}}
        <div class="modal fade" id="farmerModal" tabindex="-1" role="dialog" aria-labelledby="farmerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="farmerModalLabel">Farmer Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>First Name:</strong> {{ $cropproject->farmer->f_name }}</li>
                            <li><strong>Last Name:</strong> {{ $cropproject->farmer->l_name }}</li>
                            <li><strong>Email:</strong> {{ $cropproject->farmer->email }}</li>
                            <li><strong>Phone:</strong> {{ $cropproject->farmer->phone }}</li>
                            <li><strong>Address:</strong> {{ $cropproject->farmer->address }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
