<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('investor')->user()->f_name }}</h4>
        <p>{{ Auth::guard('investor')->user()->email }}</p>
        <a href="{{ route('investor.profile.edit') }}" wire:navigate>
            <p>profile update</p>
        </a>
        <ul class="list-group">

            <li class="list-group p-3"><a href="{{ route('investor.cropproject.show') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Crop Project</a></li>
            <li class="list-group p-3"><a href="{{ route('investor.investingorg.show') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Investing org</a></li>
            <li class="list-group p-3"><a href="{{ route('investor.logout') }}" class="btn btn-outline-danger btn-block"
                    wire:navigate>Logout</a></li>
        </ul>
    </div>
</div>
