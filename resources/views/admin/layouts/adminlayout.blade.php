{{--  Include head  --}}
@include('admin.include.head')

<body id="page-top">

    {{--  <!-- Page Wrapper -->  --}}
    <div id="wrapper">

        {{--  Include sidebar  --}}
        @include('admin.include.sidebar')

        {{--  <!-- Content Wrapper -->  --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{--  <!-- Main Content -->  --}}
            <div id="content">

                {{--  Include topber  --}}
                @include('admin.include.topber')

                {{--  <!-- Begin Page Content -->  --}}
                <div class="container-fluid">

                    {{--  <!-- Page Heading -->  --}}
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    {{--  yield content here  --}}
                    @yield('admincontent')

                </div>
                {{--  <!-- /.container-fluid -->  --}}

            </div>
            {{--  <!-- End of Main Content -->  --}}

            {{--  <!-- Footer -->  --}}
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Napver 2023</span>
                    </div>
                </div>
            </footer>
            {{--  <!-- End of Footer -->  --}}

        </div>
        {{--  <!-- End of Content Wrapper -->  --}}

    </div>
    {{--  <!-- End of Page Wrapper -->  --}}

    {{--  <!-- Scroll to Top Button-->  --}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{--  Include footer  --}}
    @include('admin.include.footer')
