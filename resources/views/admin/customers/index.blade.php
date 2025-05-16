@extends('layouts.master')
@section('title') @lang('translation.Customers') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Customer_Manage') @endslot
@slot('title') @lang('translation.Customers') @endslot
@endcomponent
@if(session()->has('success')) <p class="text-success">{{ session()->get('success') }} @endif</p>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                <!-- Nav tabs -->
                {{-- <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link {{ $status==Utility::ITEM_INACTIVE?'active':'' }}" data-plugin="render-tab" data-tab=".customerdetailsTab" href="{{ route('admin.customers.show.tab', encrypt(Utility::ITEM_INACTIVE)) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Non Verified Customers</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $status==Utility::ITEM_ACTIVE?'active':'' }}" data-plugin="render-tab" data-tab=".customerdetailsTab" href="{{ route('admin.customers.show.tab', encrypt(Utility::ITEM_ACTIVE)) }}"  role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Verified Customers</span>
                        </a>
                    </li>

                </ul> --}}
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane customerdetailsTab active" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                <h5 class="card-title">Customers List <span class="text-muted fw-normal ms-2">({{ $customers->count() }})</span></h5>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <div>
                                        <a href="{{ route('admin.customers.create') }}" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                         <!-- end row -->

                        <div class="table-responsive mb-4">
                            <table class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                <tr>
                                    {{-- <th scope="col" style="width: 50px;">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> --}}
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    {{-- <th scope="col">Place</th> --}}
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rating</th>
                                    {{-- <th scope="col">Supplier Status</th> --}}
                                    <th style="width: 80px; min-width: 80px;">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach ($customers as $customer)
                                       <tr>
                                           {{-- <th scope="row">
                                               <div class="form-check font-size-16">
                                                   <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                   <label class="form-check-label" for="contacusercheck1"></label>
                                               </div>
                                           </th> --}}
                                           <td>{{ $customer->id }}</td>
                                           <td>
                                               @if(!empty($customer->image))
                                                   <img src="{{ URL::asset('storage/customers/' . $customer->image) }}" alt="" class="avatar-sm rounded-circle me-2">
                                               @else
                                               <div class="avatar-sm d-inline-block align-middle me-2">
                                                   <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                                                       <i class="bx bxs-user-circle"></i>
                                                   </div>
                                               </div>
                                               @endif
                                               <a href="#" class="text-body">{{ $customer->name }}
                                                {{-- <small><a target="_blank" href="{{ route('admin.customers.view',encrypt($customer->id))}}">View Details</a></small></a> --}}
                                           </td>
                                           {{-- <td>{{ $customer->city }}</td> --}}
                                           <td>{{ $customer->phone }}</td>
                                           <td>{{ $customer->email }}</td>
                                           {{-- <td>{{ $customer->is_verify? "Verified" : "Not Verified" }}</td> --}}
                                           <td>
                                            <p class="text-muted float-start me-3">
                                                @for ($x=1;$x<=$customer->my_review; $x++)
                                                    <i class="bx bxs-star text-warning"></i>
                                                @endfor
                                                @for ($x=1;$x<=(Utility::MAX_REVIEW_LIMIT-$customer->my_review); $x++)
                                                <span class="bx bxs-star"></span>
                                                @endfor
                                                ({{ $customer->reviews()->count() }})
                                                {{-- <span class="bx bxs-star text-warning"></span>
                                                <span class="bx bxs-star text-warning"></span>
                                                <span class="bx bxs-star text-warning"></span>
                                                <span class="bx bxs-star text-warning"></span>
                                                <span class="bx bxs-star"></span> --}}
                                            </p>
                                           </td>
                                           {{-- <td>{{ $customer->is_seller ? "Seller" : "Not Seller" }}</td> --}}
                                           <td>
                                                <a href="{{ route('admin.customers.view',encrypt($customer->id))}}" class="btn btn-primary btn-sm btn-rounded" >
                                                    Details
                                                </a>
                                            </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                            <div class="pagination justify-content-center">{{ $customers->links() }}</div>
                        </div>
                         <!-- end table responsive -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
{{-- <script>
    $(document).ready(function() {
        $(document).on('click','[data-plugin="render-tab"]',function(e) {
            e.preventDefault();

            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            var url = $(this).data('target');
            var tab_Id = $(this).data('tab');
            renderTab(url,tab_Id);
        });
    });

    var url = "{{ route('admin.customers.show.tab', Utility::ITEM_INACTIVE) }}";
    var tab_Id = ".customerdetailsTab";
    renderTab(url,tab_Id);

    function renderTab(url,tab_Id) {
        $.get(url, function (data) {
            var $el = $(data.html).clone();
            $el = $(tab_Id).html($el);
            $(tab_Id).tab('show');
        });
    }
</script> --}}
@endsection
