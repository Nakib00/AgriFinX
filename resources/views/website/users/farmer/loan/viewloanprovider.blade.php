@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    @livewire('farmer.microloan.view-provider', ['id' => $provider_id])
@endsection
