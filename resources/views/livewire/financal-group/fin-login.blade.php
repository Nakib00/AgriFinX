<div>
    {{-- The whole world belongs to you. --}}
    @section('content')
        {{--  include alirt  --}}
        @include('website.include.alirt')
        <section class="section-padding" id="section_3">
            <div class="container">
                <h1 class="text-center">Agricultural Organization</h1>

                {{--  Registration  --}}
                <div class="form-container" id="registerForm" style="display:none;">
                    <h2>Register</h2>
                    <form action="{{ route('org.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" name="f_name" placeholder="Enter first name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" name="l_name" placeholder="Enter last name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="category">Organization Type:</label>
                            <select class="form-control" name="Orgnization_type" required>
                                <option value="" disabled selected>Select Organization Type</option>
                                <option value="loan_provider">Loan Provider</option>
                                <option value="investing_organization">Investing Organization</option>
                                <option value="insurance_organization">Insurance Organization</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Register</button>
                    </form>
                    <p class="mt-3"><a href="#login-form" onclick="toggleForm()">Already registered</a>.</p>
                </div>

                {{--  Login  --}}
                <div class="form-container" id="loginForm">
                    <h2>Login</h2>
                    <form action="{{ route('org.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="category">Organization Type:</label>
                            <select class="form-control" name="Orgnization_type" required>
                                <option value="" disabled selected>Select Organization Type</option>
                                <option value="loan_provider">Loan Provider</option>
                                <option value="investing_organization">Investing Organization</option>
                                <option value="insurance_organization">Insurance Organization</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </form>
                    <p class="mt-3"><a href="#login-form" onclick="toggleForm()">Not registered</a>.</p>
                </div>
            </div>
        </section>

        {{--  js file  --}}
        <script>
            function toggleForm() {
                var registerForm = document.getElementById("registerForm");
                var loginForm = document.getElementById("loginForm");

                if (registerForm.style.display === "none") {
                    registerForm.style.display = "block";
                    loginForm.style.display = "none";
                } else {
                    registerForm.style.display = "none";
                    loginForm.style.display = "block";
                }
            }
        </script>
    @endsection
</div>
