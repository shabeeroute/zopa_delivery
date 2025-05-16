{{-- @extends(request()->routeIs('admin.*') ? 'layouts.master' : 'seller.layouts.master') --}}
@extends('layouts.master')
@section('title', 'Add orders')
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
{{-- @if(request()->routeIs('admin.rent_products.*') || request()->routeIs('seller.rent_products.*') )
    <style>
        .hidden{
            display: none !important;
        }
        .close_container{
            position: relative;
        }
        .btn-close {
            position: absolute !important;
            right: 30px;
            top: 36px;
        }
    </style>
@endif --}}
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Sale_Manage') @endslot
@slot('title') @lang('translation.Sales') @endslot
@endcomponent
<div class="row">
    <form method="POST" action="{{ isset($product)? route('admin.products.update') : route('admin.products.store')  }}" enctype="multipart/form-data">
        @csrf
        @if (isset($product))
            <input type="hidden" name="product_id" value="{{ encrypt($product->id) }}" />
            <input type="hidden" name="_method" value="PUT" />
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Information</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Customers</label>
                                <input id="customer_id" name="customer_id" type="text" class="form-control" value="1" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="customer_address_id">customer_address_id</label>
                                <input id="customer_address_id" name="customer_address_id" type="text" class="form-control" value="1">
                            </div>
                            <div class="mb-3">
                                <label for="invoice_no">invoice_no</label>
                                <input id="invoice_no" name="invoice_no" type="text" class="form-control"  placeholder="invoice_no" value="INV004/2023">

                            </div>
                            <div class="mb-3">
                                <label class="control-label">pay_method</label>
                                <select class="select2 form-control" name="pay_method" id="pay_method"  data-placeholder="Choose ...">
                                    <option value="1">Online</option>
                                    <option value="2">COD</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">is_delivery</label>
                                <select class="select2 form-control" name="is_delivery" id="is_delivery"  data-placeholder="Choose ...">
                                    <option value="0">pickup</option>
                                    <option value="1">delivery</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="delivery_charge">delivery_charge</label>
                                <input id="delivery_charge" name="delivery_charge" type="text" class="form-control" value="30">
                            </div>

                            {{-- <div class="mb-3">
                                <label class="control-label">Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ isset($product)&&($product->brand_id==$brand->id)?'selected':''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{-- <div class="mb-3">
                                <label for="purchase_price">Purchase Price</label>
                                <input id="purchase_price" name="purchase_price" type="text" class="form-control" placeholder="Purchase Price" value="{{ isset($product)?$product->purchase_price:old('purchase_price')}}">
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" name="quantity" type="text" class="form-control" placeholder="Quantity" value="{{ isset($product)?$product->quantity:old('quantity')}}">
                            </div> --}}
                            <div class="mb-3">
                                <label for="description">Product Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Product Description">{{ isset($product)?$product->description:old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="description_ar">Product Description Arabic</label>
                                <textarea class="form-control" name="description_ar" id="description_ar" rows="5" placeholder="Product Description Arabic">{{ isset($product)?$product->description_ar:old('description_ar')}}</textarea>
                            </div>
                            {{-- @if(request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit') )
                                <div class="mb-3">
                                    <label for="price">Selling Price</label>
                                    <input id="price" name="price" type="text" class="form-control" placeholder="Selling Price" value="{{ isset($product)?$product->price:old('price')}}">
                                </div>
                            @endif --}}
                            <div class="mb-3">
                                <label class="control-label">Unit</label>
                                <select name="uom" id="uom" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach (Utility::product_units() as $index => $product_unit )
                                    <option value="{{ $index}}" {{ isset($product)&&($product->uom==$index)?'selected':'' }}>{{ $product_unit['en']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="control-label">Product Size</label>
                                <select name="size" id="size" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach (Utility::product_sizes() as $index => $product_size )
                                    <option value="{{ $index}}" {{ isset($product)&&($product->size==$index)?'selected':'' }}>{{ $product_size['en']}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label class="control-label">Product Color</label>
                                <select name="color" id="color" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach (Utility::product_colors() as $index => $product_color )
                                    <option value="{{ $index}}" {{ isset($product)&&($product->color==$index)?'selected':'' }}>{{ $product_color['en']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="barcode">Bar Code</label>
                                <input id="barcode" name="barcode" type="text" class="form-control" placeholder="Bar Code" value="{{ isset($product)?$product->barcode:old('barcode')}}">
                            </div>
                            <div class="mb-3">
                                <label for="sku">SKU Code</label>
                                <input id="sku" name="sku" type="text" class="form-control" placeholder="SKU Code" value="{{ isset($product)?$product->sku:old('sku')}}">
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label for="tax_type_id">Tax</label>
                                <select name="tax_type_id" id="tax_type_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($taxes as $tax)
                                        <option value="{{ $tax->id }}" {{ isset($product)&&($product->tax_type_id==$tax->id)?'selected':''}}>{{ $tax->name }}</option>
                                    @endforeach
                                </select>
                                @error('tax_type_id') <p class="text-danger">{{ $message }} @enderror
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label for="warranty">Warranty</label>
                                <input id="warranty" name="warranty" type="text" class="form-control" placeholder="Warranty" value="{{ isset($product)?$product->warranty:old('warranty')}}">
                            </div>
                            <div class="mb-3">
                                <label for="video">Youtube Video Link</label>
                                <input id="video" name="video" type="text" class="form-control" placeholder="Video Link" value="{{ isset($product)?$product->video:old('video')}}">
                            </div> --}}
                            {{-- @if(request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit') ) --}}
                                <div class="mb-3">
                                    <label class="control-label">Status</label>
                                    <select name="status" id="status" class="form-control select2">
                                        @foreach (Utility::status() as $index => $status )
                                        <option value="{{ $index}}" {{ isset($product)&&($product->status==$index)?'selected':'' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>product id</label>
                                    <input id="prices-1" name="prices[]" type="text" class="form-control"  placeholder="Price" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Price</label>
                                <input id="prices-" name="prices[]" type="text" class="form-control"  placeholder="Price" value="">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Meta Data</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="meta_title">Meta title</label>
                                <input id="meta_title" name="meta_title" type="text" class="form-control" placeholder="Meta Title" value="{{ isset($product)?$product->meta_title:old('meta_title')}}">
                            </div>
                            <div class="mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input id="meta_keywords" name="meta_keywords" type="text" class="form-control" placeholder="Meta Keywords" value="{{ isset($product)?$product->meta_keywords:old('meta_keywords')}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Meta Description">{{ isset($product)?$product->meta_description:old('meta_description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#imageContainer').find('button').click(function() {
            $('#imageContainer').hide();
            $('#fileContainer').show();
            $('input[name="isImageDelete"]').val(1);
        })

        $('#fileContainer').find('button').click(function() {
            $('#fileContainer').hide();
            $('#imageContainer').show();
            $('input[name="isImageDelete"]').val(0);
        })
    });
</script>
{{-- @if(request()->routeIs('admin.rent_products.*') || request()->routeIs('seller.rent_products.*') )
<script>
    $(document).ready(function() {
        $('.select2_rent_terms').select2();
        $(document).on("click", 'a[data-toggle="add-more"]', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var $el = $($(this).attr("data-template")).clone();
            $el.removeClass("hidden");
            $el.attr("id", "");

            var count = $(this).data('count');
            count = typeof count == "undefined" ? 0 : count;
            count = count + 1;
            $(this).data('count', count);

            var addindex = $(this).data("addindex");
            if(typeof addindex == "object") {
                $.each(addindex, function(i, p) {
                    var have_child = p.have_child;
                    if(typeof(have_child)  === "undefined") {
                        $el.find(p.selector).attr(p.attr, p.value + '[' + count + ']');
                    }else {
                        $el.find(p.selector).attr(p.attr, p.value +'['+count+']'+'['+have_child+']' );
                    }
                });
            }

            var increment = $(this).data("increment");
            if(typeof increment == "object") {
                $.each(increment, function(i, p) {
                    var have_child = p.have_child;
                    if(typeof(have_child)  === "undefined") {
                        $el.find(p.selector).attr(p.attr, p.value +"-"+count);
                    }else {
                        $el.find(p.selector).attr(p.attr, p.value +"-"+count+"-"+have_child);
                    }
                });
            }

            var plugins = $(this).data("plugins");
            $.each(plugins, function(i, p) {
                if(p.plugin=='select2') {
                    //$el.find(p.selector).select2();
                }

            });

            $el.hide().appendTo($(this).attr("data-container")).fadeIn();

        });

        $(document).on('click','.btn-close',function(e) {
            e.preventDefault();
            var $this = $(this);
            var item_container = $(this).data('target');
            console.log(item_container);
            $(item_container).remove();
	    });

    })
</script>
@endif --}}
@endsection
