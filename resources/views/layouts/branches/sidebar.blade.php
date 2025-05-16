<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('branch.dashboard') }}">
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
                        <li><a href="{{ route('branch.orders.index') }}" data-key="t-user-grid">@lang('translation.Sales')</a></li>
                        <li><a href="{{ url('#') }}" data-key="t-user-list">@lang('translation.Sales_Return')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">@lang('translation.Product_Manage')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('branch.product_items.create') }}" key="t-products">@lang('translation.Product_Item_Manage_Add')</a></li>
                        <li><a href="{{ route('branch.product_items.index') }}" data-key="t-product-detail">@lang('translation.Product_Item_Manage_List')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-contacts">@lang('translation.Offer_Management')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('branch.offers.index') }}" data-key="t-read-email">@lang('translation.Menu_List')</a></li>
                        <li><a href="{{ route('branch.offers.create') }}" data-key="t-user-grid">@lang('translation.Menu_Add')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('branch.messages.index') }}" class="">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Message_Manage')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('branch.notifications.index') }}" class="">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Notification_Manage')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('branch.tickets.index') }}" class="">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Tickets')</span>
                    </a>
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
