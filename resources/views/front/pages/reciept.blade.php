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
                    <li><a href="checkout-1.html">Cart items</a></li>
                    <li><a href="checkout-2.html">Delivery</a></li>
                    <li><a href="checkout-3.html">Payment</a></li>
                    <li><a class="active" href="checkout-4.html">Receipt</a></li>
                </ol>
            </div>
        </header>
    </section>

    <!-- ========================  Step wrapper ======================== -->

    <div class="step-wrapper">
        <div class="container">

            <div class="stepper">
                <ul class="row">
                    <li class="col-md-3 active">
                        <span data-text="Cart items"></span>
                    </li>
                    <li class="col-md-3 active">
                        <span data-text="Delivery"></span>
                    </li>
                    <li class="col-md-3 active">
                        <span data-text="Payment"></span>
                    </li>
                    <li class="col-md-3 active">
                        <span data-text="Receipt"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ========================  Checkout ======================== -->

    <section class="checkout">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Checkout - Step 4</h3>
            </header>

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="h2 title">Your order is completed!</span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                    </div>
                </div>
            </div>

            <!-- ========================  Payment ======================== -->

            <div class="cart-wrapper">

                <div class="note-block">

                    <div class="row">
                        <!-- === left content === -->

                        <div class="col-md-6">

                            <div class="white-block">

                                <div class="h4">Shipping info</div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Name</strong> <br />
                                            <span>John Doe</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Email</strong><br />
                                            <span>johndoe@company.com</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Phone</strong><br />
                                            <span>+122 523 352</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Zip</strong><br />
                                            <span>94107</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>City</strong><br />
                                            <span>San Francisco, California</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Address</strong><br />
                                            <span>795 Folsom Ave, Suite 600</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Company name</strong><br />
                                            <span>Mobel Inc</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Company phone</strong><br />
                                            <span>+122 333 6665</span>
                                        </div>
                                    </div>

                                </div>

                            </div> <!--/col-md-6-->

                        </div>

                        <!-- === right content === -->

                        <div class="col-md-6">
                            <div class="white-block">

                                <div class="h4">Order details</div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Order no.</strong> <br />
                                            <span>52522-63259226</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Transaction ID</strong> <br />
                                            <span>2265996</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Order date</strong> <br />
                                            <span>06/30/2017</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Shipping arrival</strong> <br />
                                            <span>07/30/2017</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="h4">Payment details</div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Transaction time</strong> <br />
                                            <span>06/30/2017 at 00:59</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Amount</strong><br />
                                            <span>$ 1259,00</span>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Cart details</strong><br />
                                            <span>**** **** **** 5446</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Items in cart</strong><br />
                                            <span>4</span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('front.includes.cart-wrapper_big')

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="h2 title">Your order is completed!</span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                    </div>
                </div>
            </div>

        </div> <!--/container-->

    </section>

@endsection
