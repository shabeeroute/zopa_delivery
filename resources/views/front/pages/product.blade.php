@extends('front.layouts.master')
@section('title') @lang('translation.Home_Page') @endsection

@section('content')

    @component('front.components.breadcrumb')
        @slot('title') Product Name @endslot
        @slot('li_1') Brand @endslot
        @slot('li_2') Products @endslot
        @slot('bg_img', 'assets/images/gallery-2.jpg')
    @endcomponent

<!-- ========================  Product ======================== -->

        <section class="product">
            <div class="main">
                <div class="container">
                    <div class="row product-flex">

                        <!-- product flex is used only for mobile order -->
                        <!-- on mobile 'product-flex-info' goes bellow gallery 'product-flex-gallery' -->

                        <div class="col-md-4 col-sm-12 product-flex-info">
                            <div class="clearfix">

                                <!-- === product-title === -->

                                <h1 class="title" data-title="Sofa">Laura <small>La Linea de Lucco</small></h1>



                                <div class="clearfix">




                                    {{-- <div class="info-box">
                                        <span><strong>Quantity</strong></span>
                                        <span><input type="number" value="2" class="form-control form-quantity" /></span>
                                    </div>

                                    <hr /> --}}
                                    <!-- === info-box === -->

                                    <div class="info-box">
                                        <span><strong>Brand</strong></span>
                                        <span>Brand name</span>
                                    </div>


                                    <!-- === info-box === -->

                                    <div class="info-box">
                                        <span><strong>Availability</strong></span>
                                        <span><i class="fa fa-check-square-o"></i> Will be available on 24 Aug 2023 only</span>
                                        <span class="hidden"><i class="fa fa-truck"></i> Out of stock</span>
                                    </div>

                                    <hr />



                                    <div class="info-box info-box-addto">
                                        <span><strong>Wishlist</strong></span>
                                        <span>
                                            <i class="add"><i class="fa fa-eye-slash"></i> Add to Watch list</i>
                                            <i class="added"><i class="fa fa-eye"></i> Remove from Watch list</i>
                                        </span>
                                    </div>



                                    <hr />

                                    <!-- === info-box === -->

                                    <div class="info-box">
                                        <span><strong>Available Colors</strong></span>
                                        <div class="product-colors clearfix">
                                            <span class="color-btn color-btn-red"></span>
                                            <span class="color-btn color-btn-blue checked"></span>
                                            <span class="color-btn color-btn-green"></span>
                                            <span class="color-btn color-btn-gray"></span>
                                            <span class="color-btn color-btn-biege"></span>
                                        </div>
                                    </div>

                                    <!-- === info-box === -->

                                    <div class="info-box">
                                        <span><strong>Choose size</strong></span>
                                        <div class="product-colors clearfix">
                                            <span class="color-btn color-btn-biege">
                                                <span class="product-size" data-text="">S</span>
                                            </span>
                                            <span class="color-btn color-btn-biege checked">M</span>
                                            <span class="color-btn color-btn-biege">XL</span>
                                            <span class="color-btn color-btn-biege">XXL</span>
                                        </div>
                                    </div>

                                </div> <!--/clearfix-->
                            </div> <!--/product-info-wrapper-->
                        </div> <!--/col-md-4-->
                        <!-- === product item gallery === -->

                        <div class="col-md-8 col-sm-12 product-flex-gallery">
                            <div class="col-md-12">
                                <!-- === add to cart === -->

                                <button type="submit" class="btn btn-buy" data-text="Buy"></button>


                                <!-- === product gallery === -->

                                <div class="owl-product-gallery open-popup-gallery">
                                    <a href="{{ asset('front/assets/images/product-1.png') }}"><img src="{{ asset('front/assets/images/product-1.png') }}" alt="" height="500" /></a>
                                    <a href="{{ asset('front/assets/images/product-2.png') }}"><img src="{{ asset('front/assets/images/product-2.png') }}" alt="" height="500" /></a>
                                    <a href="{{ asset('front/assets/images/product-3.png') }}"><img src="{{ asset('front/assets/images/product-3.png') }}" alt="" height="500" /></a>
                                    <a href="{{ asset('front/assets/images/product-4.png') }}"><img src="{{ asset('front/assets/images/product-4.png') }}" alt="" height="500" /></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row product-flex">
                        <div class="col-md-6 col-sm-12">
                            <!-- === price wrapper === -->

                            <div class="price">
                                <span class="checkbox">
                                    <input type="radio" id="radioIDc1" name="radioName3" checked="checked">
                                    <label for="radioIDc1">
                                        <strong>Hourly</strong><br><br>
                                        <span class="h3">
                                            {{ Utility::CURRENCY_DISPLAY }} 1999,00
                                            <small>{{ Utility::CURRENCY_DISPLAY }} 2999,00</small> <br>
                                        </span>
                                    </label>
                                </span>

                            </div>
                            <hr />

                            <div class="price">
                                <span class="checkbox">
                                    <input type="radio" id="radioIDc2" name="radioName3">
                                    <label for="radioIDc2">
                                        <strong>Weekly</strong><br>
                                        <span class="h3">
                                            {{ Utility::CURRENCY_DISPLAY }} 1999,00
                                            <small>{{ Utility::CURRENCY_DISPLAY }} 2999,00</small> <br>
                                        </span>
                                    </label>
                                </span>

                            </div>
                            <hr />

                            <div class="price">
                                <span class="checkbox">
                                    <input type="radio" id="radioIDc3" name="radioName3">
                                    <label for="radioIDc3">
                                        <strong>Monthly</strong><br>
                                        <span class="h3">
                                            {{ Utility::CURRENCY_DISPLAY }} 1999,00
                                            <small>{{ Utility::CURRENCY_DISPLAY }} 2999,00</small> <br>
                                        </span>
                                    </label>
                                </span>

                            </div>
                            <hr />
                        </div>
                        <div class="col-md-6 col-sm-12">

                        </div>
                    </div>
                </div>
            </div>

            <!-- === product-info === -->

            <div class="info">
                <div class="container">
                    <div class="row">

                        <!-- === product-designer === -->


                        <!-- === nav-tabs === -->

                        <div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist">
                                {{-- <li role="presentation" class="active">
                                    <a href="#designer" aria-controls="designer" role="tab" data-toggle="tab">
                                        <i class="icon icon-user"></i>
                                        <span>Collection</span>
                                    </a>
                                </li> --}}
                                <li role="presentation" class="active">
                                    <a href="#design" aria-controls="design" role="tab" data-toggle="tab">
                                        <i class="icon icon-sort-alpha-asc"></i>
                                        <span>Specification</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#rating" aria-controls="rating" role="tab" data-toggle="tab">
                                        <i class="icon icon-thumbs-up"></i>
                                        <span>Rating</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- === tab-panes === -->

                            <div class="tab-content">

                                {{-- <div role="tabpanel" class="tab-pane active" id="designer">
                                    <div class="content">

                                        <!-- === designer collection title === -->

                                        <h3>Designers collection</h3>

                                        <div class="products">
                                            <div class="row">

                                                <!-- === product-item === -->

                                                <div class="col-md-6 col-xs-6">
                                                    <article>
                                                        <div class="figure-grid">
                                                            <div class="image">
                                                                <a href="#productid1" class="mfp-open">
                                                                    <img src="{{ asset('front/assets/images/product-1.png') }}" alt="" width="360" />
                                                                </a>
                                                            </div>
                                                            <div class="text">
                                                                <h4 class="title"><a href="product.html">Green corner</a></h4>
                                                                <sup>Designer collection</sup>
                                                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <!-- === product-item === -->

                                                <div class="col-md-6 col-xs-6">
                                                    <article>
                                                        <div class="figure-grid">
                                                            <div class="image">
                                                                <a href="#productid1" class="mfp-open">
                                                                    <img src="{{ asset('front/assets/images/product-2.png') }}" alt="" width="360" />
                                                                </a>
                                                            </div>
                                                            <div class="text">
                                                                <h4 class="title"><a href="product.html">Laura</a></h4>
                                                                <sup>Designer collection</sup>
                                                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <!-- === product-item === -->

                                                <div class="col-md-6 col-xs-6">
                                                    <article>
                                                        <div class="figure-grid">
                                                            <div class="image">
                                                                <a href="#productid1" class="mfp-open">
                                                                    <img src="{{ asset('front/assets/images/product-3.png') }}" alt="" width="360" />
                                                                </a>
                                                            </div>
                                                            <div class="text">
                                                                <h4 class="title"><a href="product.html">Nude</a></h4>
                                                                <sup>Designer collection</sup>
                                                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                                <!-- === product-item === -->

                                                <div class="col-md-6 col-xs-6">
                                                    <article>
                                                        <div class="figure-grid">
                                                            <div class="image">
                                                                <a href="#productid1" class="mfp-open">
                                                                    <img src="{{ asset('front/assets/images/product-4.png') }}" alt="" width="360" />
                                                                </a>
                                                            </div>
                                                            <div class="text">
                                                                <h4 class="title"><a href="product.html">Aurora</a></h4>
                                                                <sup>Designer collection</sup>
                                                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>

                                            </div> <!--/row-->
                                        </div> <!--/products-->
                                    </div> <!--/content-->
                                </div> <!--/tab-pane--> --}}
                                <!-- ============ tab #2 ============ -->

                                <div role="tabpanel" class="tab-pane active" id="design">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Product Specification</h3>
                                                <p>
                                                    Sofa Laura is a casual, contemporary collection that your family is sure to love.
                                                    The plush pillows and soft sloped arms create the ultimate combination for relaxation and comfort.
                                                </p>
                                                <p>
                                                    The collection is tailored with rounded padded arms, box-welted seat cushions, and loose back cushions.
                                                    Comfort is provided by high density seat cushions supported with a hardwood frame construction.
                                                    This collection is built for comfort and style!
                                                </p>
                                                <p>
                                                    Sofa is fun and elegant with beauty and style that will stay cutting-edge trendy through the years.
                                                    It is completely padded, including the back and outside arms - combining comfort and value to make rewarding relaxatio.
                                                </p>
                                            </div>

                                        </div> <!--/row-->
                                    </div> <!--/content-->
                                </div> <!--/tab-pane-->
                                <!-- ============ tab #3 ============ -->

                                <div role="tabpanel" class="tab-pane" id="rating">

                                    <!-- ============ ratings ============ -->

                                    <div class="content">
                                        <h3>Rating</h3>

                                        <div class="row">

                                            <!-- === comments === -->

                                            <div class="col-md-12">
                                                <div class="comments">

                                                    <div class="comment-wrapper">

                                                        <!-- === comment === -->

                                                        <div class="comment-block">
                                                            <div class="comment-user">
                                                                <div><img src="{{ asset('front/assets/images/user-2.jpg') }}" alt="Alternate Text" width="70" /></div>
                                                                <div>
                                                                    <h5>
                                                                        <span>John Doe</span>
                                                                        <span class="pull-right">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </span>
                                                                        <small>03.05.2017</small>
                                                                    </h5>
                                                                </div>
                                                            </div>

                                                            <!-- comment description -->

                                                            <div class="comment-desc">
                                                                <p>
                                                                    In vestibulum tellus ut nunc accumsan eleifend. Donec mattis cursus ligula, id
                                                                    iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas
                                                                    ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus
                                                                    tempor justo et mollis facilisis. Donec placerat at nulla sed suscipit. Praesent
                                                                    accumsan, sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec
                                                                    gravida
                                                                </p>
                                                            </div>

                                                            <!-- comment reply -->

                                                            <div class="comment-block">
                                                                <div class="comment-user">
                                                                    <div><img src="{{ asset('front/assets/images/user-2.jpg') }}" alt="Alternate Text" width="70" /></div>
                                                                    <div>
                                                                        <h5>Administrator<small>08.05.2017</small></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-desc">
                                                                    <p>
                                                                        Curabitur sit amet elit quis tellus tincidunt efficitur. Cras lobortis id
                                                                        elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque
                                                                        a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                                        nisl egestas diam, nec blandit diam ipsum eget dolor. Maecenas ultricies
                                                                        tempus nibh, sit amet facilisis mauris vulputate in.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!--/reply-->
                                                        </div>

                                                        <!-- === comment === -->

                                                        <div class="comment-block">
                                                            <div class="comment-user">
                                                                <div><img src="{{ asset('front/assets/images/user-2.jpg') }}" alt="Alternate Text" width="70" /></div>
                                                                <div>
                                                                    <h5>
                                                                        <span>John Doe</span>
                                                                        <span class="pull-right">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </span>
                                                                        <small>03.05.2017</small>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="comment-desc">
                                                                <p>
                                                                    Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus.
                                                                    Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                                    nisl egestas diam, nec blandit diam ipsum eget dolor. In vestibulum tellus
                                                                    ut nunc accumsan eleifend. Donec mattis cursus ligula, id iaculis dui feugiat
                                                                    nec. Etiam ut ante sed neque lacinia volutpat. Maecenas ultricies tempus
                                                                    nibh, sit amet facilisis mauris vulputate in. Phasellus tempor justo et mollis
                                                                    facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit
                                                                    amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div><!--/comment-wrapper-->

                                                    <div class="comment-header">
                                                        <a href="#" class="btn btn-clean-dark">12 comments</a>
                                                    </div> <!--/comment-header-->
                                                    <!-- === add comment === -->

                                                    <div class="comment-add">

                                                        <div class="comment-reply-message">
                                                            <div class="h3 title">Leave a Reply </div>
                                                            <p>Your email address will not be published.</p>
                                                        </div>

                                                        <form action="#" method="post">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="Your Name" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="Your Email" />
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea rows="10" class="form-control" placeholder="Your comment"></textarea>
                                                            </div>
                                                            <div class="clearfix text-center">
                                                                <a href="#" class="btn btn-main">Add comment</a>
                                                            </div>
                                                        </form>

                                                    </div><!--/comment-add-->
                                                </div> <!--/comments-->
                                            </div>


                                        </div> <!--/row-->
                                    </div> <!--/content-->
                                </div> <!--/tab-pane-->
                            </div> <!--/tab-content-->
                        </div>
                    </div> <!--/row-->
                </div> <!--/container-->
            </div> <!--/info-->
        </section>

        <!-- ========================  Product info popup - quick view ======================== -->

        <div class="popup-main mfp-hide" id="productid1">

            <!-- === product popup === -->

            <div class="product">

                <!-- === popup-title === -->

                <div class="popup-title">
                    <div class="h1 title">Laura <small>product category</small></div>
                </div>

                <!-- === product gallery === -->

                <div class="owl-product-gallery">
                    <img src="{{ asset('front/assets/images/product-1.png') }}" alt="" width="640" />
                    <img src="{{ asset('front/assets/images/product-2.png') }}" alt="" width="640" />
                    <img src="{{ asset('front/assets/images/product-3.png') }}" alt="" width="640" />
                    <img src="{{ asset('front/assets/images/product-4.png') }}" alt="" width="640" />
                </div>

                <!-- === product-popup-info === -->

                <div class="popup-content">
                    <div class="product-info-wrapper">
                        <div class="row">

                            <!-- === left-column === -->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Brand</strong>
                                    <span>Brand name</span>
                                </div>

                                <div class="info-box">
                                    <strong>Availability</strong>
                                    <span><i class="fa fa-check-square-o"></i> in stock</span>
                                </div>
                            </div>

                            <!-- === right-column === -->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Available Colors</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <strong>Choose size</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">S</span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
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
                            <span class="h3">{{ Utility::CURRENCY_DISPLAY }} 1999,00 <small>{{ Utility::CURRENCY_DISPLAY }} 2999,00</small></span>
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
@endsection
