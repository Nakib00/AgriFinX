@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="col-lg-12 col-12 text-center mb-4">
        <h2>View Insurance application</h2>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Farmer Name</th>
                <th>Claim Amount</th>
                <th>Crop Amount</th>
                <th>Insurance Premium</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="" data-toggle="modal"
                        data-target="#farmerModal{{ $insurance->farmer->id }}">{{ $insurance->farmer->f_name }}
                        {{ $insurance->farmer->l_name }}</a></td>
                <td>{{ $insurance->crop_amount }}</td>
                <td>{{ $insurance->claim_amount }}</td>
                <td>{{ $insurance->isurance_premium }}</td>
               

            </tr>
        </tbody>
    </table>

    {{--  <!-- Farmer Info Modal -->  --}}
    <div class="modal fade" id="farmerModal{{ $insurance->farmer->id }}" tabindex="-1" role="dialog"
        aria-labelledby="farmerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="farmerModalLabel">{{ $insurance->farmer->f_name }}
                        {{ $insurance->farmer->l_name }} Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Email: {{ $insurance->farmer->email }}</p>
                    <p>Phone: {{ $insurance->farmer->phone }}</p>
                    <p>Address: {{ $insurance->farmer->address }}</p>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Loan Approval Form -->  --}}
    <form action="{{ route('org.insurance.status', $insurance->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="approvel_status">Approval Status</label>
            <select class="form-control" id="approval_status" name="approvel_status">
                <option value="1">Approved</option>
                <option value="0">Rejected</option>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
