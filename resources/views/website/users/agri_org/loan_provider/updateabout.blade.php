@extends('website.layout.webpage')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <h4 class="mb-4">Loan provider Dashboard</h4>
            </div>
        </div>

        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.agri_org.loan_provider.include.sidebar')
            <div class="col-md-9 pb-3">
                <div class="aboutcontainer">
                    <h1>Update About Details</h1>
                    {{--  <!-- Form -->  --}}
                    <form id="microloan-form" action="{{ route('org.updateAbout', ['id' => $organization->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea id="about" name="about">{{ $organization->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="loan-types">Loan Providing Types</label>
                            <textarea id="loan-types" name="loan_types">{{ $organization->type_of_service }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="team">Team</label>
                            <textarea id="team" name="team" required>{{ $organization->team }}</textarea>
                        </div>

                        <div class="form-group pb-2">
                            <label for="conditions">Conditions</label>
                            <textarea id="conditions" name="conditions">{{ $organization->conditions }}</textarea>
                        </div>

                        <button type="submit">Update</button>
                    </form>
                    <a href="{{ route('org.about') }}"><button type="text"
                            class="mt-3 btn btn-secondary">Back</button></a>
                </div>
            </div>
        </div>
    </div>

    {{--  CK editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#conditions'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#loan-types'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
