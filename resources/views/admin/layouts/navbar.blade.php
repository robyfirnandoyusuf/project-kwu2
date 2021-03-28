<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="/backend-assets/img/faces/avatar.jpg" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                {{\Auth::user()->name}}
                <b class="caret"></b>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li>
                        <a href="{{route('admin.auth.logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="nav">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a data-toggle="collapse" href="#pagesExamples">
                <i class="material-icons">person</i>
                <p>User
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="pagesExamples">
                <ul class="nav">
                    <li>
                        <a href="{{ route('admin.user.index', ['type' => 'admin']) }}">Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.index', ['type' => 'mitra']) }}">Mitra</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.index', ['type' => 'user']) }}">Common User</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{ route('admin.property.index') }}">
                <i class="material-icons">home</i>
                <p>Property</p>
            </a>
        </li>
    </ul>
</div>
