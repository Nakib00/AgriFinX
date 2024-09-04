<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('content')
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h2>Insurance Provider Organization</h2>
                    </div>
                    {{--  Table start  --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($insuranceProviders as $provider)
                                    <tr>
                                        <td><a href="{{ route('iprofile', $provider->id) }}"
                                                wire:navigate>{{ $provider->f_name }}
                                                {{ $provider->l_name }}</a></td>
                                        <td>{{ $provider->address }}</td>
                                        <td>{{ $provider->email }}</td>
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
</div>
