<div class="sidebar">
    <div class="sidebar-brand">
        <div class="text-right pr-3 text-white">
            <i class="las la-bars la-2x"></i> 
        </div>
        <div style="height: 6em; width: 6em; background-color:white; border-radius: 100%;"><img style="height: 6em; width: 6em; border-radius: 100%; object-fit:contain; border: 1px solid lavender" src={{asset('images/market-research-help-logo-2.png')}} />            
            
        </div>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <span><i class="la-2x las la-tachometer-alt"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('pages-company') }}">
                    <span><i class="la-2x las la-columns"></i></span>
                    <span>Pages</span>
                </a>
            </li>
            <li>
                <a href="{{ url('services') }}">
                    <span><i class="la-2x lab la-servicestack"></i></span>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="{{ url('case-studies') }}">
                    <span><i class="las la-poll la-2x"></i></span>
                    <span>Case Studies</span>
                </a>
            </li>
            <li>
                <a href="{{ url('blogs') }}">
                    <span><i class="la-2x las la-blog"></i></span>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ url('team-members') }}">
                    <span><i class="la-2x las la-users"></i></span>
                    <span>Team Members</span>
                </a>
            </li>
            <li>
                <a href="{{ url('others') }}">
                    <span><i class="la-2x las la-atom"></i></span>
                    <span>Others</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-management') }}">
                    <span><i class="la-2x las la-users-cog"></i></span>
                    <span>Admin Management</span>
                </a>
            </li>
        </ul>
    </div>
</div>