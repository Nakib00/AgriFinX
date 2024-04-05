@extends('website.layout.webpage')
@section('content')
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/slide/volunteer-helping-with-donation-box.jpg') }}"
                                    class="carousel-image img-fluid" alt="..." />

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>be a Kind Heart</h1>

                                    {{--  <p>Professional charity theme based on Bootstrap 5.2.2</p>  --}}
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg') }}"
                                    class="carousel-image img-fluid" alt="..." />

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Non-profit</h1>

                                    {{--  <p>You can support us to grow more</p>  --}}
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/slide/medium-shot-people-collecting-donations.jpg') }}"
                                    class="carousel-image img-fluid" alt="..." />

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Humanity</h1>

                                    {{--  <p>Please tell your friends about our website</p>  --}}
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">Welcome to Agrifinx</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{ route('mindex') }}" class="d-block">
                            <img src="{{ asset('assets/images/icons/hands.png') }}" style="width: 50%"
                                class="featured-block-image img-fluid" alt="" />

                            <p class="featured-block-text">
                                Invest in <strong>Microloans</strong>
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{ route('iindex') }}" class="d-block">
                            <img src="{{ asset('assets/images/icons/heart.png') }}" style="width: 50%"
                                class="featured-block-image img-fluid" alt="" />

                            <p class="featured-block-text">
                                <strong>Insurance</strong> in Crop
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{ route('agropindex') }}" class="d-block">
                            <img src="{{ asset('assets/images/icons/receive.png') }}" style="width: 50%"
                                class="featured-block-image img-fluid" alt="" />

                            <p class="featured-block-text">
                                Agro <strong>Project</strong>
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{ route('ivesindex') }}" class="d-block">
                            <img src="{{ asset('assets/images/icons/scholarship.png') }}" style="width: 50%"
                                class="featured-block-image img-fluid" alt="" />

                            <p class="featured-block-text">
                                <strong>Investing</strong> Group
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <img src="{{ asset('assets/images/group-people-volunteering-foodbank-poor-people.jpg') }}"
                        class="custom-text-box-image img-fluid" alt="" />
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-box">
                        <h2 class="mb-2">Our Story</h2>

                        <h5 class="mb-3">
                            AgriFinx
                        </h5>

                        <p class="mb-0">
                            Grow your farm, secure your future.Connect with investors, access financing & manage
                            risk.Agrifinx is a one-stop platform for farmers and investors.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Our Mission</h5>

                                <p>
                                    Sed leo nisl, posuere at molestie ac, suscipit auctor quis
                                    metus
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                <div class="counter-thumb">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to=""
                                            data-speed="1000"></span>
                                        <span class="counter-number-text">{{ $totalinvestor }}</span>
                                    </div>

                                    <span class="counter-text">Investor</span>
                                </div>

                                <div class="counter-thumb mt-4">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to=""
                                            data-speed="1000"></span>
                                        <span class="counter-number-text">{{ $totalcroppeoject }}</span>
                                    </div>
                                    <span class="counter-text">Agriculture projects</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Agriculture Project</h2>
                    <p>Help farmers become agile by investing</p>
                </div>
                @foreach ($cropprojects as $project)
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 pb-3">
                        <div class="custom-block-wrap">
                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-3">{{ $project->project_name }}</h5>

                                    <p>
                                        {{ $project->description }}
                                    </p>

                                    <div class="progress mt-4">
                                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="d-flex align-items-center my-2">
                                        @if ($project->investing_amount)
                                            <p class="ms-auto mb-0">
                                                <strong>Total Investment:</strong>
                                                {{ $project->investing_amount }} TK
                                            </p>
                                        @else
                                            <p class="ms-auto mb-0">No investing amount available</p>
                                        @endif
                                    </div>
                                </div>

                                <a href="{{ route('agriproject.show', ['id' => $project->id]) }}"
                                    class="custom-btn btn">Invest now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5 col-md-5 col-12 m-auto mt-4">
                <a class="nav-link custom-btn custom-border-btn btn" href="{{ route('agropindex') }}">See more</a>
            </div>
        </div>
    </section>

    <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h2 class="text-white mb-4">Investor</h2>

                    <form class="custom-form volunteer-form mb-5 mb-lg-0" action="#" method="post" role="form">
                        <h3 class="mb-4">Become a Investor today</h3>

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="f_name" id="volunteer-name" class="form-control"
                                    placeholder="Jack" required />
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="text" name="l_name" id="volunteer-name" class="form-control"
                                    placeholder="Doe" required />
                            </div>

                            <div class="col-lg-12 col-12">
                                <input type="email" name="email" id="volunteer-email" pattern="[^ @]*@[^ @]*"
                                    class="form-control" placeholder="Jackdoe@gmail.com" required />
                            </div>

                        </div>
                        <div class="col-lg-12 col-12">
                            <input type="password" name="password" id="volunteer-name" class="form-control"
                                placeholder="Password" required />
                        </div>

                        <button type="submit" class="form-control">Submit</button>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <img src="{{ asset('assets/images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg') }}"
                        class="volunteer-image img-fluid" alt="" />

                    <div class="custom-block-body text-center">
                        <h4 class="text-white mt-lg-3 mb-lg-3">About Investor</h4>

                        <p class="text-white">
                            Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg
                            kohm tokito Professional charity theme based
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonial-section section-padding section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mb-lg-3">Happy Farmers</h2>

                    <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">
                                        Lorem Ipsum dolor sit amet, consectetur adipsicing
                                        kengan omeg kohm tokito charity theme
                                    </h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Maria</span>,
                                        Boss</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">
                                        Sed leo nisl, posuere at molestie ac, suscipit auctor
                                        mauris quis metus tempor orci
                                    </h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Thomas</span>,
                                        Partner</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">
                                        Lorem Ipsum dolor sit amet, consectetur adipsicing
                                        kengan omeg kohm tokito charity theme
                                    </h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Jane</span>,
                                        Advisor</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">
                                        Sed leo nisl, posuere at molestie ac, suscipit auctor
                                        mauris quis metus tempor orci
                                    </h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Bob</span>,
                                        Entreprenuer</small>
                                </div>
                            </div>

                            <ol class="carousel-indicators">
                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                    <img src="{{ asset('assets/images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg') }}"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar" />
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                    <img src="{{ asset('assets/images/avatar/portrait-young-redhead-bearded-male.jpg') }}"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar" />
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                    <img src="{{ asset('assets/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg') }}"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar" />
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                    <img src="{{ asset('assets/images/avatar/studio-portrait-emotional-happy-funny.jpg') }}"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar" />
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  include contact form  --}}
    @include('website.include.Contact')
@endsection
