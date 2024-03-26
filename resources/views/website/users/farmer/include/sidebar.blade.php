<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('farmer')->user()->f_name }}</h4>
        <p>{{ Auth::guard('farmer')->user()->email }}</p>
        <a href="{{ route('farmer.profile.edit') }}">
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group-item"><a href=""
                    class="btn btn-primary btn-block">Button 1</a></li>
            <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">Button 2</a></li>
            <li class="list-group-item"><a href="{{ route('farmer.logout') }}"
                    class="btn btn-danger btn-block">Logout</a></li>
        </ul>
    </div>
</div>
