@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <form action="{{ route('farmer.subsidy.apply', ['id' => $agriofficerid]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="reason">Reason for Taking Subsidy</label>
                <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter reason" required>
            </div>
            <div class="form-group">
                <label for="amount">Farm size</label>
                <input type="number" class="form-control" id="amount" name="farm_size" placeholder="Enter Farm size" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>
@endsection
