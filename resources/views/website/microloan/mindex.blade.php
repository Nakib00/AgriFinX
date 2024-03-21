@extends('website.layout.webpage')
@section('content')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Microloan Provider Organization</h2>
                </div>

                {{--  Table start  --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loanProviders as $provider)
                            <tr>
                                <td><a href="{{ route('mprofile', $provider->id) }}">{{ $provider->f_name }}
                                        {{ $provider->l_name }}</a></td>
                                <td>{{ $provider->address }}</td>
                                <td>{{ $provider->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--  end  --}}
            </div>
        </div>
    </section>
@endsection
