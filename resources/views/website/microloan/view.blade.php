@extends('website.layout.webpage')
@section('content')
    <section class="section-padding" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Microloan Provider Organization Profile</h2>
            </div>

            {{--  <!-- About section -->  --}}
            <div class="profile-section">
                <h2>About</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra ipsum sed neque aliquam, vitae
                    varius massa vestibulum. Quisque id lobortis purus.</p>
            </div>

            {{--  <!-- Loan providing types section -->  --}}
            <div class="profile-section">
                <h2>Loan Providing Types</h2>
                <p>We offer various types of microloans tailored to the needs of small businesses, startups, and
                    individuals.</p>
                <ul>
                    <li>Startup loans</li>
                    <li>Small business loans</li>
                    <li>Personal microloans</li>
                </ul>
            </div>

            {{--  <!-- Team section -->  --}}
            <div class="profile-section">
                <h2>Team</h2>
                <p>Our dedicated team of professionals is committed to providing excellent service and support to our
                    clients.</p>
                <p>Contact us to learn more about our team members and their expertise.</p>
            </div>

            {{--  <!-- Conditions section -->  --}}
            <div class="profile-section">
                <h2>Conditions</h2>
                <p>We have flexible repayment terms and competitive interest rates. Our goal is to help you succeed by
                    providing access to affordable microloans.</p>
                <p>Contact us for detailed information about our terms and conditions.</p>
            </div>

            {{--  <!-- Contact section -->  --}}
            <div class="profile-section">
                <h2>Contact</h2>
                <p>If you have any questions or inquiries, please feel free to contact us:</p>
                <ul>
                    <li>Email: info@microloanprovider.org</li>
                    <li>Phone: +1234567890</li>
                    <li>Address: 123 Main Street, City, Country</li>
                </ul>
            </div>

        </div>
    </section>
@endsection
