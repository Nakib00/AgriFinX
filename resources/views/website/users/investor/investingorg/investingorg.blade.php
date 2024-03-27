@extends('website.users.investor.layout.investorlayout')
@section('agriofficer.dashboard')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Investing Organization</h2>
                </div>
                {{--  Table start  --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investingorg as $provider)
                                <tr>
                                    <td>{{ $provider->f_name }} {{ $provider->l_name }}</td>
                                    <td>{{ $provider->address }}</td>
                                    <td>{{ $provider->email }}</td>
                                    <td>
                                        {{-- View Icon --}}
                                        <a href="{{ route('investor.investingorg.view', ['id' => $provider->id]) }}"
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
