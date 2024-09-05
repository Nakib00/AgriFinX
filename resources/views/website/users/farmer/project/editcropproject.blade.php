@extends('website.users.farmer.layout.farmerlayout')

@section('agriofficer.dashboard')
    @livewire('farmer.project.edit-project', ['id' => $cropproject_id])
@endsection
