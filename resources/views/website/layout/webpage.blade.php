{{--  include head  --}}
@include('website.include.head')

{{--  Include navigation ber  --}}
@include('website.include.napver')

<main>

    @yield('content')

</main>

{{--  include footer  --}}
@include('website.include.footer')
