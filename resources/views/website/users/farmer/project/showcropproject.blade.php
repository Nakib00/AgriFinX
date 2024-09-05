@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    @livewire('farmer.project.show-project', ['id' => $cropproject_id])
@endsection
