<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('flnancial_group')->user()->f_name }}</h4>
        <p>{{ Auth::guard('flnancial_group')->user()->email }}</p>
        <a href="{{ route('investing.editprofile') }}" wire:navigate>
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group p-3"><a
                    href="{{ route('investing.about', ['id' => Auth::guard('flnancial_group')->id()]) }}"
                    class="btn btn-outline-success btn-block" wire:navigate>About</a>
            </li>
            <li class="list-group p-3"><a href="{{ route('investing.show.crop.project') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Invest in project</a></li>
            <li class="list-group p-3"><a href="{{ route('investing.show.investor') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Investor's</a></li>
            <li class="list-group-item"><a href="{{ route('org.logout') }}" class="btn btn-outline-danger btn-block"
                    wire:navigate>Logout</a>
            </li>
        </ul>
    </div>
</div>
