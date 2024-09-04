<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('agricultural_officer')->user()->f_name }}</h4>
        <p>{{ Auth::guard('agricultural_officer')->user()->email }}</p>
        <a href="{{ route('agri_officer.profile.edit') }}" wire:navigate>
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group p-3"><a href="{{ route('agri_officer.logout') }}"
                    class="btn btn-outline-danger btn-block" wire:navigate>Logout</a></li>
        </ul>
    </div>
</div>
