<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @section('content')
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investingorg as $provider)
                                    <tr>
                                        <td><a href="{{ route('ivesprofile', $provider->id) }}"
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
