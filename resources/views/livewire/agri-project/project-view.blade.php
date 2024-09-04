<div>
    {{-- Stop trying to control. --}}
    @section('content')
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold">Crop Project Details</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 30%;">Project Information</th>
                                            <th>Values</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Project Name</strong></td>
                                            <td>{{ $cropproject[0]->project_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description</strong></td>
                                            <td>{{ $cropproject[0]->description }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Launch Date</strong></td>
                                            <td>{{ $cropproject[0]->launch_date }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>End Date</strong></td>
                                            <td>{{ $cropproject[0]->end_date }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Farm Size</strong></td>
                                            <td>{{ $cropproject[0]->farm_size }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Crop Quality</strong></td>
                                            <td>{{ $cropproject[0]->corp_quality }} KG</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pesticide Cost</strong></td>
                                            <td>{{ $cropproject[0]->pesticide_cost }} TK</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Labour Cost</strong></td>
                                            <td>{{ $cropproject[0]->labour_cost }} TK</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Expence</strong></td>
                                            <td>{{ $cropproject[0]->labour_cost + $cropproject[0]->pesticide_cost }} TK</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Funding Status</strong></td>
                                            <td>{{ $cropproject[0]->funding_status ? 'Funded' : 'Not Funded' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Farmer</strong></td>
                                            <td><a href="#" data-toggle="modal"
                                                    data-target="#farmerModal">{{ $cropproject[0]->farmer_name }}</a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Crop</strong></td>
                                            <td>{{ $cropproject[0]->crop_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created At</strong></td>
                                            <td>{{ $cropproject[0]->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Updated At</strong></td>
                                            <td>{{ $cropproject[0]->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-3 p-3">
                                {{-- Back button --}}
                                <a href="{{ route('agropindex') }}" class="btn btn-secondary btn-lg mr-3">Back</a>

                                <a href="{{ route('login_investor') }}" class="btn btn-outline-success btn-lg"
                                    wire:navigate>Invest</a>
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
                                <li><strong>Name:</strong> {{ $cropproject[0]->farmer_name }}</li>
                                <li><strong>Email:</strong> {{ $cropproject[0]->farmer_email }}</li>
                                <li><strong>Phone:</strong> {{ $cropproject[0]->farmer_phone }}</li>
                                <li><strong>Address:</strong> {{ $cropproject[0]->farmer_address }}</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        {{--  <!-- Bootstrap CSS -->  --}}
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        {{--  <!-- jQuery -->  --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        {{--  <!-- Bootstrap JS -->  --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
</div>
