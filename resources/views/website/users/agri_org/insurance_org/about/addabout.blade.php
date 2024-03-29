@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 pb-3">
                <div class="aboutcontainer">
                    <h1>Add About Details</h1>
                    {{--  <!-- Form -->  --}}
                    <form id="add-about-form" action="{{ route('insurance.storeAbout') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea id="about" name="about"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="loan-types">Loan Providing Types</label>
                            <textarea id="loan-types" name="loan_types"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="team">Team</label>
                            <textarea id="team" name="team" required></textarea>
                        </div>

                        <div class="form-group pb-2">
                            <label for="conditions">Conditions</label>
                            <textarea id="conditions" name="conditions"></textarea>
                        </div>

                        <button type="submit">Add Information</button>
                    </form>
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
