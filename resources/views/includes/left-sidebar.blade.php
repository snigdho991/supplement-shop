<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
        @if(Auth::check())
            <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>
                
                    <li class="menu-title" key="t-apps">Event Stuffs</li>
                        <li>
                            <a href="{{ route('events.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">All Events</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('events.create') }}" class="waves-effect">
                                <i class="bx bx-folder-plus"></i>
                                <span key="t-calendar">Add New Event</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Deal Stuffs</li>
                        <li>
                            <a href="{{ route('deals.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">All Deals/Offers</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('deals.create') }}" class="waves-effect">
                                <i class="bx bx-folder-plus"></i>
                                <span key="t-calendar">Add New Deal</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Query Stuff</li>
                        <li>
                            <a href="{{ route('queries.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">All Queries</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('queries.spam') }}" class="waves-effect">
                                <i class="bx bx-block"></i>
                                <span key="t-calendar">Spam Queries</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Order Stuff</li>
                        <li>
                            <a href="{{ route('pending.orders') }}" class="waves-effect">
                                <i class="bx bx-play-circle"></i>
                                <span key="t-calendar">Pending Orders</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('successful.orders') }}" class="waves-effect">
                                <i class="bx bx-badge-check"></i>
                                <span key="t-calendar">Successful Orders</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('declined.orders') }}" class="waves-effect">
                                <i class="bx bx-x-circle"></i>
                                <span key="t-calendar">Declined Orders</span>
                            </a>
                        </li>
                
                    {{-- <li class="menu-title" key="t-apps">History Stuffs</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-calendar-weekend"></i>
                                <span key="t-calendar">This Week</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-clock-start"></i>
                                <span key="t-calendar">This Month</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">This Year</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-aperture"></i>
                                <span key="t-calendar">Advanced Search</span>
                            </a>
                        </li> --}}
            </ul>
            
        @endif
        </div>
        <!-- Sidebar -->
    </div>
    
</div>