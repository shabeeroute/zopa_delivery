@extends('front.layouts.master')
@section('title') @lang('translation.Home_Page') @endsection

@section('content')

    @component('front.components.breadcrumb')
        @slot('title') Categories @endslot
        @slot('bg_img', 'assets/images/gallery-2.jpg')
    @endcomponent
    <!-- ========================  Products ======================== -->

    <section class="products">
        <div class="container">

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title">Product categories</h2>
                        <div class="text">
                            <p>Select category</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-1.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Green corner</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-2.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Laura</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-3.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Nude</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-4.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Aurora</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-5.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Dining set</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- === product-item === -->

                <div class="col-md-4 col-xs-6">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="products-grid.html">
                                    <img src="{{ asset('front/assets/images/product-6.png') }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="products-grid.html">Seat chair</a></h2>
                                <sup>Category description</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>

            </div><!--/row-->

        </div><!--/container-->
    </section>
@endsection
