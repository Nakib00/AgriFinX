<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('farmer')->user()->f_name }}</h4>
        <p>{{ Auth::guard('farmer')->user()->email }}</p>
        <a href="{{ route('farmer.profile.edit') }}">
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group p-3"><a href="{{ route('farmer.cropproject') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Crop
                    Project</a></li>
            <li class="list-group p-3"><a href="{{ route('farmer.microloan') }}"
                    class="btn btn-outline-success btn-block" wire:navigate>Loan Apply</a></li>
            <li class="list-group p-3"><a
                    href=" {{ route('farmer.insurance') }}"class="btn btn-outline-success btn-block" wire:navigate>Insurance Apply</a>
            </li>
            <li class="list-group p-3"><a
                    href=" {{ route('farmer.subsidy') }}"class="btn btn-outline-success btn-block" wire:navigate>Subsidy Apply</a>
            </li>
            <li class="list-group p-3"><a href="{{ route('farmer.logout') }}"
                    class="btn btn-outline-danger btn-block" wire:navigate>Logout</a></li>
        </ul>
    </div>
</div>
