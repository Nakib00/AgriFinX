@extends('website.layout.webpage')
@section('content')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Agriculture Project</h2>
                </div>
                @foreach ($cropprojects as $project)
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 pb-3">
                        <div class="custom-block-wrap">
                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-3">{{ $project->project_name }}</h5>
                                    <p>{{ $project->description }}</p>

                                    <div class="progress mt-4">
                                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="d-flex align-items-center my-2">
                                        @if ($project->investing_amount)
                                            <p class="ms-auto mb-0">
                                                <strong>Total Investment:</strong>
                                                {{ $project->investing_amount }} TK
                                            </p>
                                        @else
                                            <p class="ms-auto mb-0">No investing amount available</p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('agriproject.show', ['id' => $project->id]) }}"
                                    class="custom-btn btn">Invest now</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
