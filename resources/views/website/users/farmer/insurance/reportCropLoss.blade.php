@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <form action="{{ route('farmer.reportcroploss', ['id' => $insuranceprovider]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="reason">Reason for Crop Loss</label>
                <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter Reason" required>
            </div>
            <div class="form-group">
                <label for="amount">Estimated Crop Loss Amount</label>
                <input type="number" class="form-control" id="amount" name="loss_amount" placeholder="Enter Amount"
                    required>
            </div>
            <div class="form-group">
                <label for="amount">Disaster type</label>
                <input type="text" class="form-control" id="amount" name="disaster_type"
                    placeholder="Enter Disaster Type" required>
            </div>
            <div class="form-group">
                <label for="amount">Minimum Sell Amount</label>
                <input type="number" class="form-control" id="amount" name="minimum_sellamountt"
                    placeholder="Enter Minimum Sell Amount" required>
            </div>
            <button type="submit" class=".btn-primary,
            .btn-success">Apply</button>
        </form>
    </div>
@endsection
