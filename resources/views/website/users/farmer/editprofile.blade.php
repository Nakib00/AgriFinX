@extends('website.users.farmer.deashboad')
@section('agriofficer.dashboard')
    <div class="col-md-9 pb-5">
        <div class="form-container pb-5">
            <h2>Edit Profile</h2>
            <form action="{{ route('farmer.profile.update') }}" class="pb-4" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $user->f_name }}">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $user->l_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                </div>
                <div class="form-group pb-4">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth"
                        value="{{ $user->dateofbirth }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
