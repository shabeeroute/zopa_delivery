<!-- ========================  Cart wrapper ======================== -->

<div class="cart-wrapper">
    <!--cart header -->

    <div class="cart-block cart-block-header clearfix">
        <div>
            <span>Product</span>
        </div>
        <div>
            <span>&nbsp;</span>
        </div>
        <div>
            <span>Quantity</span>
        </div>
        <div class="text-right">
            <span>Price</span>
        </div>
    </div>

    <!--cart items-->

    <div class="clearfix">
        <div class="cart-block cart-block-item clearfix">
            <div class="image">
                <a href="product.html"><img src="{{ asset('front/assets/images/product-1.png') }}" alt="" /></a>
            </div>
            <div class="title">
                <div class="h4"><a href="product.html">Green corner</a></div>
                <div>Green corner</div>
            </div>
            <div class="quantity">
                <input type="number" value="2" class="form-control form-quantity" />
            </div>
            <div class="price">
                <span class="final h3">{{ Utility::CURRENCY_DISPLAY }} 1.998</span>
                <span class="discount">{{ Utility::CURRENCY_DISPLAY }} 2.666</span>
            </div>
            <!--delete-this-item-->
            <span class="icon icon-cross icon-delete"></span>
        </div>

        <div class="cart-block cart-block-item clearfix">
            <div class="image">
                <a href="product.html"><img src="{{ asset('front/assets/images/product-2.png') }}" alt="" /></a>
            </div>
            <div class="title">
                <div class="h4"><a href="product.html">Green corner</a></div>
                <div>Green corner</div>
            </div>
            <div class="quantity">
                <input type="number" value="2" class="form-control form-quantity" />
            </div>
            <div class="price">
                <span class="final h3">{{ Utility::CURRENCY_DISPLAY }} 1.998</span>
                <span class="discount">{{ Utility::CURRENCY_DISPLAY }} 2.666</span>
            </div>
            <!--delete-this-item-->
            <span class="icon icon-cross icon-delete"></span>
        </div>

    </div>

    <!--cart prices -->

    <div class="clearfix">
        <div class="cart-block cart-block-footer clearfix">
            <div>
                <strong>Discount 15%</strong>
            </div>
            <div>
                <span>{{ Utility::CURRENCY_DISPLAY }} 159,00</span>
            </div>
        </div>

        <div class="cart-block cart-block-footer clearfix">
            <div>
                <strong>Shipping</strong>
            </div>
            <div>
                <span>{{ Utility::CURRENCY_DISPLAY }} 30,00</span>
            </div>
        </div>

        <div class="cart-block cart-block-footer clearfix">
            <div>
                <strong>VAT</strong>
            </div>
            <div>
                <span>{{ Utility::CURRENCY_DISPLAY }} 59,00</span>
            </div>
        </div>
    </div>

    <!--cart final price -->

    <div class="clearfix">
        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
            <div>
                <span class="checkbox">
                    <input type="checkbox" id="couponCodeID">
                    <label for="couponCodeID">Promo code</label>
                    <input type="text" class="form-control form-coupon" value="" placeholder="Enter your coupon code" />
                </span>
            </div>
            <div>
                <div class="h2 title">{{ Utility::CURRENCY_DISPLAY }} 1259,00</div>
            </div>
        </div>
    </div>
</div>
