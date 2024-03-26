@extends('website.users.investor.deashboad')
@section('agriofficer.dashboard')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>All Crop Project</h2>
                </div>
                {{--  Table start  --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Project Name</th>
                                <th>Launch Date</th>
                                <th>End Date</th>
                                <th>Farm Size</th>
                                <th>Crop Quality</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cropproject as $cropproject)
                                <tr>
                                    <td>{{ $cropproject->project_name }}</td>
                                    <td>{{ $cropproject->launch_date }}</td>
                                    <td>{{ $cropproject->end_date }}</td>
                                    <td>{{ $cropproject->farm_size }}</td>
                                    <td>{{ $cropproject->corp_quality }}</td>
                                    <td>
                                        {{-- View Icon --}}
                                        <a href="{{ route('investor.cropproject.view', ['id' => $cropproject->id]) }}"
                                            class="btn btn-info" title="View">
                                            <i class="far fa-eye">Invest</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{--  end  --}}
            </div>
        </div>
    </section>
@endsection
