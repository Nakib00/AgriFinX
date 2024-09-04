@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Insurance Application</h2>
                        </div>
                        {{--  Table start  --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Farmer Name</th>
                                        <th>Insurance premium</th>
                                        <th>Crop amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insurance as  $insu)
                                        <tr>
                                            <td>{{$insu ->farmer_name }}</td>
                                            <td>{{$insu ->insurance_premium}} TK</td>
                                            <td>{{$insu ->crop_amount}} KG</td>
                                            <td>
                                                <a href="{{ route('org.insurance.insuranceview',$insu->id) }}"
                                                    class="btn btn-primary" wire:navigate>View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{--  end  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
