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

                                    <p>Professional charity theme based on Bootstrap 5.2.2</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg') }}"
                                    class="carousel-image img-fluid" alt="..." />

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Non-profit</h1>

                                    <p>You can support us to grow more</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/slide/medium-shot-people-collecting-donations.jpg') }}"
                                    class="carousel-image img-fluid" alt="..." />

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Humanity</h1>

                                    <p>Please tell your friends about our website</p>
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
                        <a href="{{ route('sindex') }}" class="d-block">
                            <img src="{{ asset('assets/images/icons/scholarship.png') }}" style="width: 50%"
                                class="featured-block-image img-fluid" alt="" />

                            <p class="featured-block-text">
                                <strong>Subsidies</strong> of Goverment
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
                            Kind Heart Charity, Non-Profit Organization
                        </h5>

                        <p class="mb-0">
                            This is a Bootstrap 5.2.2 CSS template for charity
                            organization websites. You can feel free to use it. Please
                            tell your friends about TemplateMo website. Thank you. HTML
                            CSS files updated on 20 Oct 2022.
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

                                <ul class="custom-list mt-2">
                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Charity Theme
                                    </li>

                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Semantic HTML
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                <div class="counter-thumb">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to="2009"
                                            data-speed="1000"></span>
                                        <span class="counter-number-text"></span>
                                    </div>

                                    <span class="counter-text">Founded</span>
                                </div>

                                <div class="counter-thumb mt-4">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to="120"
                                            data-speed="1000"></span>
                                        <span class="counter-number-text">B</span>
                                    </div>

                                    <span class="counter-text">Donations</span>
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
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="{{ asset('assets/images/causes/group-african-kids-paying-attention-class.jpg') }}"
                            class="custom-block-image img-fluid" alt="" />

                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3">Children Education</h5>

                                <p>
                                    Lorem Ipsum dolor sit amet, consectetur adipsicing kengan
                                    omeg kohm tokito
                                </p>

                                <div class="progress mt-4">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="d-flex align-items-center my-2">
                                    <p class="mb-0">
                                        <strong>Raised:</strong>
                                        $18,500
                                    </p>

                                    <p class="ms-auto mb-0">
                                        <strong>Goal:</strong>
                                        $32,000
                                    </p>
                                </div>
                            </div>

                            <a href="donate.html" class="custom-btn btn">Invest now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="{{ asset('assets/images/causes/poor-child-landfill-looks-forward-with-hope.jpg') }}"
                            class="custom-block-image img-fluid" alt="" />

                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3">Poverty Development</h5>

                                <p>
                                    Sed leo nisl, posuere at molestie ac, suscipit auctor
                                    mauris. Etiam quis metus tempor
                                </p>

                                <div class="progress mt-4">
                                    <div class="progress-bar w-50" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="d-flex align-items-center my-2">
                                    <p class="mb-0">
                                        <strong>Raised:</strong>
                                        $27,600
                                    </p>

                                    <p class="ms-auto mb-0">
                                        <strong>Goal:</strong>
                                        $60,000
                                    </p>
                                </div>
                            </div>

                            <a href="donate.html" class="custom-btn btn">Invest now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="custom-block-wrap">
                        <img src="{{ asset('assets/images/causes/african-woman-pouring-water-recipient-outdoors.jpg') }}"
                            class="custom-block-image img-fluid" alt="" />

                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3">Supply drinking water</h5>

                                <p>
                                    Orci varius natoque penatibus et magnis dis parturient
                                    montes, nascetur ridiculus
                                </p>

                                <div class="progress mt-4">
                                    <div class="progress-bar w-100" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="d-flex align-items-center my-2">
                                    <p class="mb-0">
                                        <strong>Raised:</strong>
                                        $84,600
                                    </p>

                                    <p class="ms-auto mb-0">
                                        <strong>Goal:</strong>
                                        $100,000
                                    </p>
                                </div>
                            </div>

                            <a href="donate.html" class="custom-btn btn">Invest now</a>
                        </div>
                    </div>
                </div>
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
                                <input type="text" name="volunteer-name" id="volunteer-name" class="form-control"
                                    placeholder="Jack Doe" required />
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="email" name="volunteer-email" id="volunteer-email"
                                    pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com"
                                    required />
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-subject" id="volunteer-subject"
                                    class="form-control" placeholder="Subject" required />
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="input-group input-group-file">
                                    <input type="file" class="form-control" id="inputGroupFile02" />

                                    <label class="input-group-text" for="inputGroupFile02">Upload your CV</label>

                                    <i class="bi-cloud-arrow-up ms-auto"></i>
                                </div>
                            </div>
                        </div>

                        <textarea name="volunteer-message" rows="3" class="form-control" id="volunteer-message"
                            placeholder="Comment (Optional)"></textarea>

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
