@extends('website.users.agri_org.investing_org.deashboad')
@section('scontent.dashboard')
    <section class="section-padding" id="section_3">
        <div class="container">
            {{--  investor  --}}
            <div class="row mt-3">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Investor</h2>
                </div>
                {{--  Table start  --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Investor Name</th>
                                <th>Investing Amount</th>
                                <th>Investing Date</th>
                                <th>Percentage Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investments as $investment)
                                <tr>
                                    <td>{{ $investment->f_name }}{{ $investment->l_name }}</td>
                                    <td>{{ $investment->investing_amount }}</td>
                                    <td>{{ $investment->investing_date }}</td>
                                    <td>{{ $investment->percentage_rate }}%</td>
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
