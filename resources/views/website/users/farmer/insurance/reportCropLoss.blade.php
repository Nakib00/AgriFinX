@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')

    <div class="modal fade" id="cropLossModal" tabindex="-1" role="dialog" aria-labelledby="cropLossModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropLossModalLabel">Report Crop Loss</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farmer.reportcroploss', ['id' => $organization[0]->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="reason">Reason for Crop Loss</label>
                            <input type="text" class="form-control" id="reason" name="disaster_type" placeholder="Enter Disaster Type">
                        </div>
                        <div class="form-group">
                            <label for="amount">Estimated Crop Loss Amount</label>
                            <input type="number" class="form-control" id="amount" name="loss_amount" placeholder="Enter Amount">
                        </div> 
                       <button type="submit" class="btn btn-primary">Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
            </div>
        </div>
    </div>
</div>
        
</div> 
@endsection

@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <form action="{{ route('farmer.reportcroploss', ['id' =>  $Insuranceroviders]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="reason">Reason for Crop Loss</label>
                <input type="text" class="form-control" id="reason" name="disaster_type" placeholder="Enter Reason">
            </div>
            <div class="form-group">
                <label for="amount">Estimated Crop Loss Amount</label>
                <input type="number" class="form-control" id="amount" name="loss_amount" placeholder="Enter Amount">
            </div> 
            <div class="form-group">
                <label for="amount">Disaster type</label>
                <input type="text" class="form-control" id="amount" name="disaster_type" placeholder="Enter Disaster Type" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>
@endsection