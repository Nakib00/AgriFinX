<div class="col-md-3">
    <div class="sidebar">
        <h4 class="mb-3">Welcome, {{ Auth::guard('flnancial_group')->user()->f_name }}</h4>
        <p>{{ Auth::guard('flnancial_group')->user()->email }}</p>
        <a href="{{ route('loanprovider.editprofile') }}">
            <p>profile update</p>
        </a>
        <ul class="list-group">
            <li class="list-group p-3">
                <a href="{{ route('loanprovider.about', ['id' => Auth::guard('flnancial_group')->id()]) }}"
                    class="btn btn-outline-success btn-block ">About</a>
            </li>
            <li class="list-group p-3">
                <a href="{{ route('org.loanprovider.loanshow') }}" class="btn btn-outline-success btn-block ">Micro loans
                    Application</a>
            </li>
            <li class="list-group p-3">
                <a href="{{ route('org.loanprovider.approvelloan') }}"
                    class="btn btn-outline-success btn-block ">Approved loans</a>
            </li>
            <li class="list-group p-3">
                <a href="{{ route('org.logout') }}" class="btn btn-outline-danger btn-block">Logout</a>
            </li>
        </ul>
    </div>
</div>
