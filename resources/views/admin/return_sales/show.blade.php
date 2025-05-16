@extends('layouts.master')
@section('title') @lang('translation.Sales_Return_Detail') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Sale_Manage') @endslot
@slot('title') @lang('translation.Sales_Return_Detail') @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div> --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        {{-- <p class="mb-2">Order ID: <span class="text-primary">#{{ $return_sale->invoice_no }}</span></p> --}}
                        <h6 class="text-primary">Customer Details</h6>
                        <p class="mb-2"><a class="text-primary" href="{{ route('admin.customers.view',encrypt($return_sale->sale_item->sale->customer->id))}}" target="_blank">{{ $return_sale->sale_item->sale->customer->name }} (ID:{{ $return_sale->sale_item->sale->customer->id }})</a></p>
                        <p class="text-primary mb-0"><i class="bx bx-phone font-size-16 align-middle text-primary me-1"></i>{{ $return_sale->sale_item->sale->customer->phone }}</p>
                        <p class="text-success mb-2"><i class="bx bx-message font-size-16 align-middle text-success me-1"></i>{{ $return_sale->sale_item->sale->customer->email }}</p>
                        <p class="text-muted mb-0">{{ $return_sale->sale_item->sale->customer->building_no }}, {{ $return_sale->sale_item->sale->customer->street }}</p>
                        <p class="text-muted mb-0">{{ $return_sale->sale_item->sale->customer->district }}</p>
                        <p class="text-muted mb-0">{{ $return_sale->sale_item->sale->customer->city }}</p>
                        <p class="text-muted mb-4">{{ $return_sale->sale_item->sale->customer->postal_code }}</p>
                        <p class="text-muted mb-4">{{ $return_sale->sale_item->sale->customer->country }}</p>
                        <p class="mb-2">Seller Type: {{ $return_sale->is_customer? Utility::SELLER_TYPE_CUSTOMER : Utility::SELLER_TYPE_WAREHOUSE }}</span></p>
                        <p class="mb-3">Seller Name:
                            <a class="text-primary"  href="{{ route('admin.branches.view',encrypt($return_sale->sale_item->product_item->branch->id))}}" target="_blank">{{ $return_sale->sale_item->product_item->branch->name }}, {{ $return_sale->sale_item->product_item->branch->city }}</a>
                        </p>
                        <p class="mb-0">Order Return Status: <span class="badge badge-pill badge-soft-primary font-size-12">{{ Utility::saleStatus()[$return_sale->status]['name'] }}</span></p>
                        <p class="mb-0">Delivery Status: {!! $return_sale->sale_item->is_delivered? '<span class="badge badge-pill badge-soft-success font-size-12">Delivered</span>' : '<span class="badge badge-pill badge-soft-danger font-size-12">Not Delivered</span>' !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="text-primary mb-2">Payment Details</h6>
                        <p class="mb-0">Payment Method : {!! $return_sale->sale_item->sale->payment_method_text !!}</p>
                        <p class="mb-2">Payment Status : {!! $return_sale->sale_item->payment_text !!} </p>
                        <h6 class="mb-2">Sub Total : {{ ( $return_sale->sale_item->quantity* $return_sale->sale_item->price) . ' ' . Utility::CURRENCY_DISPLAY }}</h6>
                        <h6 class="mb-2">Total VAT : {{ ( $return_sale->sale_item->quantity*$return_sale->vat) . ' ' . Utility::CURRENCY_DISPLAY }}</h6>
                        @isset( $return_sale->sale_item->delivery_charge)
                            <h6 class="mb-2">Delivery Charge : {{  $return_sale->sale_item->delivery_charge . ' ' . Utility::CURRENCY_DISPLAY }}</h6>
                        @endisset
                        <h5 class="mb-2">Grand Total : {{ ( $return_sale->sale_item->quantity* $return_sale->sale_item->price) + ( $return_sale->sale_item->quantity* $return_sale->sale_item->vat) +  $return_sale->sale_item->delivery_charge . ' ' . Utility::CURRENCY_DISPLAY }}</h5>
                        <a href="{{ route('admin.sale_returns.invoice.view', encrypt( $return_sale->id)) }}" target="_blank" class="btn btn-primary btn-lg waves-effect waves-light" >View Invoice</a>
                    </div>

                </div>
            </div>
            {{-- //TODO: add delivery address here --}}

            <div class="card-header">
                <h3 class="card-title">Order ID - {{  $return_sale->invoice_no }}</h3>
                <p class="card-title">Booking Date - {{  $return_sale->sale_item->created_at->format('d-m-Y') }}</p>
                <p class="card-title">Order Return Date - {{  $return_sale->created_at->format('d-m-Y') }}</p>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-sm-12">
                        <p class="mb-4">Status: {{ Utility::saleStatus()[$return_sale->status]['name'] }}</p>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">VAT</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{ URL::asset('/assets/images/product/img-7.png') }}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">{{  $return_sale->sale_item->product_item->name }}</h5>
                                            <p class="text-muted mb-0">{{  $return_sale->sale_item->price . ' ' . Utility::CURRENCY_DISPLAY }} x {{  $return_sale->sale_item->quantity }}</p>
                                        </div>
                                    </td>
                                    <td>{{ Utility::rentTermNameById( $return_sale->sale_item->rent_term_id) }}</td>
                                    {{-- <td>{{  $return_sale->sale_item->price *  $return_sale->sale_item->quantity . ' ' . Utility::CURRENCY_DISPLAY }}</td> --}}
                                    <td>{{  $return_sale->sale_item->price . ' ' . Utility::CURRENCY_DISPLAY }}</td>
                                    <td>{{  $return_sale->sale_item->quantity }} Item{{  $return_sale->sale_item->quantity>1 ? 's' :'' }}</td>
                                    <td>{{  $return_sale->sale_item->vat . ' ' . Utility::CURRENCY_DISPLAY }}</td>
                                    <td>{{ Utility::saleStatus()[ $return_sale->sale_item->status]['name'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <h6 class="m-0 text-right">&nbsp;</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0 text-right">{{  $return_sale->sale_item->price *  $return_sale->sale_item->quantity . ' ' . Utility::CURRENCY_DISPLAY }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total VAT:</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0 text-right">{{  $return_sale->sale_item->vat *  $return_sale->sale_item->quantity . ' ' . Utility::CURRENCY_DISPLAY }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="m-0 text-right">Grand Total:</h5>
                                    </td>
                                    <td>
                                        <h5 class="m-0 text-right">{{ (( $return_sale->sale_item->price *  $return_sale->sale_item->quantity) + ( $return_sale->sale_item->vat *  $return_sale->sale_item->quantity)) . ' ' . Utility::CURRENCY_DISPLAY }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
