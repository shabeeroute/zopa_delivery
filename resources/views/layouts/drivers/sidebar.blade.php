<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('driver.dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-contacts">@lang('translation.Sale_Manage')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('driver.orders.index') }}" data-key="t-user-grid">@lang('translation.Sales')</a></li>
                        <li><a href="{{ url('#') }}" data-key="t-user-list">@lang('translation.Sales_Return')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('driver.messages.index') }}" class="">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Message_Manage')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('driver.notifications.index') }}" class="">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Notification_Manage')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-contacts">@lang('translation.Tickets')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('driver.tickets.index') }}" data-key="t-user-grid">@lang('translation.Tickets')</a></li>
                        <li><a href="{{ route('driver.tickets.create') }}" data-key="t-user-list">@lang('translation.Add_Ticket')</a></li>
                    </ul>
                </li>

            </ul>

            {{-- <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                        <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
