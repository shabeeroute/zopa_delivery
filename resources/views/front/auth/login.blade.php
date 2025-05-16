@extends('front.layouts.master')
@section('title') @lang('translation.Login_Page') @endsection

@section('content')

@component('front.components.breadcrumb')
    @slot('title') Customer page @endslot
    @slot('li_1') Login & Register @endslot
    @slot('bg_img', 'assets/images/gallery-2.jpg')
    @slot('alignment_class', 'text-center')
@endcomponent

    <!-- ========================  Login & register ======================== -->

    <section class="login-wrapper login-wrapper-page">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Sign in</h3>
            </header>

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 col-md-offset-3">

                    <!-- === login-wrapper === -->

                    <div class="login-wrapper">

                        <div class="white-block">

                            <!--signin-->

                            <div class="login-block login-block-signin">

                                <div class="h4">Sign in <a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">create an account</a></div>

                                <hr />

                                <div class="row">
                                    <form class="mt-4 pt-2" action="{{ route('customer.do.login') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{-- <input type="text" value="" class="form-control" placeholder="User ID"> --}}
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'customer@route.sa') }}" id="input-username" placeholder="Enter User Name" name="email">
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{-- <input type="password" value="" class="form-control" placeholder="Password"> --}}
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password-input" placeholder="Enter Password" value="123456">
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-xs-6">
                                            <span class="checkbox">
                                                <input type="checkbox" id="checkBoxId3">
                                                <label for="checkBoxId3">Remember me</label>
                                            </span>
                                        </div>

                                        <div class="col-xs-6 text-right">
                                            {{-- <a href="#" class="btn btn-main">Login</a>  --}}
                                            <button class="btn btn-main" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div> <!--/signin-->
                            <!--signup-->

                            <div class="login-block login-block-signup">

                                <div class="h4">Register now <a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right">Log in</a></div>

                                <hr />

                                <div class="row">
                                    <form class="mt-4 pt-2" action="{{ route('customer.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name" value="" class="form-control" placeholder="First name *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" value="" class="form-control" placeholder="Last name *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="address" id="address" value="" class="form-control" placeholder="Address/Landmark/Street *">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="zip" id="zip" value="" class="form-control" placeholder="Zip code: *">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="location" id="location" value="" class="form-control" placeholder="City *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="phone" id="phone" value="" class="form-control" placeholder="Email *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control" placeholder="Phone *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" value="" class="form-control" placeholder="Password - Atleast 6 Characters *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr />
                                            <span class="checkbox">
                                                <input type="checkbox" name="is_term" id="checkBoxId4">
                                                <label for="checkBoxId4">I have read and accepted the <a href="#">terms</a>, as well as read and understood our terms of <a href="#">business contidions</a></label>
                                            </span>
                                            <span class="checkbox">
                                                <input type="checkbox" name="is_newsletter" id="checkBoxId2">
                                                <label for="checkBoxId2">Subscribe to exciting newsletters and great tips</label>
                                            </span>
                                            <hr />
                                        </div>

                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-main btn-block">Create account</a>
                                        </div>
                                    </form>
                                </div>
                            </div> <!--/signup-->
                        </div>
                    </div> <!--/login-wrapper-->
                </div> <!--/col-md-6-->

            </div>

        </div>
    </section>
@endsection
