@extends('front.layouts.master')
@section('title') @lang('translation.Home_Page') @endsection

@section('content')

            <!-- ========================  Main header ======================== -->

            <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
                <header>
                    <div class="container text-center">
                        <h2 class="h2 title">Checkout</h2>
                        <ol class="breadcrumb breadcrumb-inverted">
                            <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                            <li><a class="active" href="checkout-1.html">Cart items</a></li>
                            <li><a href="checkout-2.html">Delivery</a></li>
                            <li><a href="checkout-3.html">Payment</a></li>
                            <li><a href="checkout-4.html">Receipt</a></li>
                        </ol>
                    </div>
                </header>
            </section>

            <!-- ========================  Checkout ======================== -->

            <div class="step-wrapper">
                <div class="container">

                    <div class="stepper">
                        <ul class="row">
                            <li class="col-md-3 active">
                                <span data-text="Cart items"></span>
                            </li>
                            <li class="col-md-3">
                                <span data-text="Delivery"></span>
                            </li>
                            <li class="col-md-3">
                                <span data-text="Payment"></span>
                            </li>
                            <li class="col-md-3">
                                <span data-text="Receipt"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <section class="checkout">

                <div class="container">

                    <header class="hidden">
                        <h3 class="h3 title">Checkout - Step 1</h3>
                    </header>

                    @include('front.includes.cart-wrapper_big')

                    <!-- ========================  Cart navigation ======================== -->

                    <div class="clearfix">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="{{ route('products') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Shop more</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ route('delivery') }}" class="btn btn-main"><span class="icon icon-cart"></span> Proceed to delivery</a>
                            </div>
                        </div>
                    </div>

                </div> <!--/container-->

            </section>

@endsection
