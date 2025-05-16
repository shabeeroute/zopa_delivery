<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
           <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('seller.dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="mail"></i>
                        <span data-key="t-email">@lang('translation.Branch_Manage')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('seller.branches.create') }}" data-key="t-inbox">@lang('translation.Add_Branch')</a></li>
                        <li><a href="{{ route('seller.branches.index') }}" data-key="t-read-email">@lang('translation.Branches')</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">@lang('translation.Product_Manage')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{ route('seller.products.create') }}" key="t-products">@lang('translation.Product_Manage_Add')</a></li>
                        <li><a href="{{ route('seller.products.index') }}" data-key="t-product-detail">@lang('translation.Product_Manage_List')</a></li>
                        <li><a href="{{ route('seller.rent_products.create') }}" data-key="t-orders">@lang('translation.Rent_Product_Add')</a></li>
                        <li><a href="{{ route('seller.rent_products.index') }}" data-key="t-customers">@lang('translation.Rent_Product_List')</a></li>
                    </ul>
                </li>--}}

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
