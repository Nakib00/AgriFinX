@extends('admin.layouts.adminlayout')
@section('admincontent')
    {{--  Include alert  --}}
    @include('website.include.alirt')

    {{--  <!-- Content Row -->  --}}
    <div class="container mt-5">
        <h3>Loan provider Info</h3>

        {{--  <!-- Table -->  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Cultivation Start Time</th>
                    <th>Cultivation End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            {{-- Edit Icon with data-toggle for modal --}}
                            <a href="" class="edit-btn">
                                <i class="fas fa-edit mr-2"></i>
                            </a>
                            {{--  Delete  --}}
                            <form action="" method="POST"
                                style="display: inline;">

                                <button type="submit" class="btn btn-link action-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

            </tbody>
        </table>
    </div>
@endsection
