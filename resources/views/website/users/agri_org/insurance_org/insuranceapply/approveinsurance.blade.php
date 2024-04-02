@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Approved Insurance</h2>
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
                                    @foreach ($approvedInsurance as $ins)
                                        <tr>
                                            <td>{{$ins->farmer->f_name }} {{ $ins->farmer->l_name }}</td>
                                            <td>{{$ins->insurance_premium }}</td>
                                            <td>{{$ins->claim_amount }}</td>
                                            <td>{{$ins->crop_amount }}</td>
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