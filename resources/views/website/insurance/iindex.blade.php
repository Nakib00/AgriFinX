@extends('website.layout.webpage')
@section('content')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Insurance Provider Organization</h2>
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
                        <tr>
                            <td><a href="">MicroFinanceCo</a></td>
                            <td>New York, USA</td>
                            <td>info@microfinanceco.com</td>
                        </tr>
                        <tr>
                            <td><a href="">MicroFinanceCo</a></td>
                            <td>London, UK</td>
                            <td>contact@microloansinc.com</td>
                        </tr>
                        <tr>
                            <td><a href="">MicroFinanceCo</a></td>
                            <td>Sydney, Australia</td>
                            <td>support@smallbizloans.com</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                {{--  end  --}}
            </div>
        </div>
    </section>
@endsection
