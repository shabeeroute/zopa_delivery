@extends('front.layouts.master')
@section('title') @lang('translation.Home_Page') @endsection

@section('content')
    @component('front.components.breadcrumb')
    @slot('title') Products @endslot
    @slot('li_1') All the products @endslot
    @slot('bg_img', 'assets/images/gallery-2.jpg')
    @slot('alignment_class', 'text-center')
    @endcomponent

    @include('front.includes.icons-wrapper')

    <section class="products">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Product category grid</h3>
            </header>

            <div class="row">

                @include('front.includes.product_filter')

                <!--product items-->

                <div class="col-md-9 col-xs-12">

                    <div class="row">

                        @foreach ($products as $product )

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid{{ $loop->iteration }}" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="label label-info">-50%</span>
                                        @isset($product->image)
                                            <div class="image">
                                                <a href="#productid{{ $loop->iteration }}" class="mfp-open">
                                                    <img src="{{ URL::asset(App\Models\Product::DIR_STORAGE . $product->image) }}" alt="{{ $product->name}}" width="360" />
                                                </a>
                                            </div>
                                        @endisset
                                        @empty($product->image)
                                            <div class="image">
                                                <a href="#productid{{ $loop->iteration }}" class="mfp-open">
                                                    <img src="{{ URL::asset('front/assets/images/product-1.png') }}" alt="{{ $product->name}}" width="360" />
                                                </a>
                                            </div>
                                        @endempty
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">{{ $product->name}}</a></h2>
                                            <sub>{{ Utility::CURRENCY_DISPLAY . ' ' . $product->price}} </sub>
                                            <sup>{{ Utility::CURRENCY_DISPLAY . ' ' . $product->price}}</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div><!--/row-->
                    <!--Pagination-->
                    <div class="pagination-wrapper justify-content-center">{{ $products->links() }}</div>

                    {{-- <div class="pagination-wrapper">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div> --}}

                </div> <!--/product items-->

            </div><!--/row-->
            <!-- ========================  Product info popup - quick view ======================== -->

            @foreach ($products as $product )
                <div class="popup-main mfp-hide" id="productid{{ $loop->iteration }}">

                    <!-- === product popup === -->

                    <div class="product">

                        <!-- === popup-title === -->

                        <div class="popup-title">
                            <div class="h1 title">{{ $product->name }} <small>{{ $product->category_names }}</small></div>
                        </div>

                        <!-- === product gallery === -->

                        <div class="owl-product-gallery">
                            <img src="{{ URL::asset(App\Models\Product::DIR_STORAGE . $product->image) }}" alt="" width="640" />
                            {{-- <img src="assets/images/product-2.png" alt="" width="640" />
                            <img src="assets/images/product-3.png" alt="" width="640" />
                            <img src="assets/images/product-4.png" alt="" width="640" /> --}}
                        </div>

                        <!-- === product-popup-info === -->

                        <div class="popup-content">
                            <div class="product-info-wrapper">
                                <div class="row">

                                    <!-- === left-column === -->

                                    <div class="col-sm-6">
                                        <div class="info-box">
                                            <strong>Brand</strong>
                                            <span>{{ !empty($product->brand)? $product->brand->name : '' }}</span>
                                        </div>
                                        {{-- <div class="info-box">
                                            <strong>Materials</strong>
                                            <span>Wood, Leather, Acrylic</span>
                                        </div> --}}
                                        <div class="info-box">
                                            <strong>Availability</strong>
                                            <span><i class="fa fa-check-square-o"></i> {{ $product->stock==0 ? "Out of Stock" : "In Stock" }} ({{ $product->stock }})</span>
                                        </div>
                                    </div>

                                    <!-- === right-column === -->

                                    <div class="col-sm-6">
                                        <div class="info-box">
                                            <strong>Available Color</strong>
                                            {{-- <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-red"></span>
                                                <span class="color-btn color-btn-blue checked"></span>
                                                <span class="color-btn color-btn-green"></span>
                                                <span class="color-btn color-btn-gray"></span>
                                                <span class="color-btn color-btn-biege"></span>
                                            </div> --}}
                                            <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-blue checked"></span>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <strong> size</strong>
                                            {{-- <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-biege">S</span>
                                                <span class="color-btn color-btn-biege checked">M</span>
                                                <span class="color-btn color-btn-biege">XL</span>
                                                <span class="color-btn color-btn-biege">XXL</span>
                                            </div> --}}
                                            <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-biege checked">M</span>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--/row-->
                            </div> <!--/product-info-wrapper-->
                        </div><!--/popup-content-->
                        <!-- === product-popup-footer === -->

                        <div class="popup-table">
                            <div class="popup-cell">
                                <div class="price">
                                    <span class="h3">{{ Utility::CURRENCY_DISPLAY . ' ' . $product->price}} <small>{{ Utility::CURRENCY_DISPLAY . ' ' . $product->price}}</small></span>
                                </div>
                            </div>
                            <div class="popup-cell">
                                <div class="popup-buttons">
                                    <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                                    <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                                </div>
                            </div>
                        </div>

                    </div> <!--/product-->
                </div> <!--popup-main-->
            @endforeach
        </div><!--/container-->
    </section>
@endsection
