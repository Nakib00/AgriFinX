<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('agricultural_officer')->user()->f_name }}</h4>
        <p>{{ Auth::guard('agricultural_officer')->user()->email }}</p>
        <a href="{{ route('agri_officer.profile.edit') }}">
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('agri_officer.button') }}"
                    class="btn btn-primary btn-block">Button 1</a></li>
            <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">Button 2</a></li>
            <li class="list-group-item"><a href="{{ route('agri_officer.logout') }}"
                    class="btn btn-danger btn-block">Logout</a></li>
        </ul>
    </div>
</div>
