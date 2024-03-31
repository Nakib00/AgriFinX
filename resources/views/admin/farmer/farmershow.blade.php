@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        <h3>Farmer Info</h3>
        {{--  <!-- Table -->  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Farmer Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farmer as $item)
                    <tr>
                        <td>
                            <button class="btn btn-link farmer-details" data-fname="{{ $item->f_name }}"
                                data-lname="{{ $item->l_name }}" data-phone="{{ $item->phone }}"
                                data-address="{{ $item->address }}">
                                {{ $item->f_name }} {{ $item->l_name }}
                            </button>
                        </td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="farmerModal" tabindex="-1" role="dialog" aria-labelledby="farmerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="farmerModalLabel">Farmer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>First Name:</strong> <span id="fname"></span></p>
                    <p><strong>Last Name:</strong> <span id="lname"></span></p>
                    <p><strong>Phone:</strong> <span id="phone"></span></p>
                    <p><strong>Address:</strong> <span id="address"></span></p>
                </div>
            </div>
        </div>
    </div>


    {{--  <!-- Include jQuery -->  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // JavaScript to handle popup display
        $(document).ready(function() {
            $('.farmer-details').click(function() {
                var fname = $(this).data('fname');
                var lname = $(this).data('lname');
                var phone = $(this).data('phone');
                var address = $(this).data('address');

                $('#fname').text(fname);
                $('#lname').text(lname);
                $('#phone').text(phone);
                $('#address').text(address);

                $('#farmerModal').modal('show');
            });
        });
    </script>
@endsection
