@extends('layouts.master')
@section('title') @lang('translation.Add_Product') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Add Rent Product @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="productname">Product Name</label>
                                <input id="productname" name="productname" type="text" class="form-control"  placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Category</label>
                                <select class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Fashion</option>
                                    <option value="EL">Electronic</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="manufacturername">Bar Code</label>
                                <input id="manufacturername" name="manufacturername" type="text" class="form-control" placeholder="Bar Code">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturerbrand">Quantity</label>
                                <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control" placeholder="Quantity">
                            </div>
                            <div class="mb-3">
                                <label for="price1">Product Size</label>
                                <input id="price1" name="price" type="text" class="form-control" placeholder="Product Size">
                            </div>
                            <div class="mb-3">
                                <label for="pric2e">Product Color</label>
                                <input id="pric2e" name="price" type="text" class="form-control" placeholder="Product Color">
                            </div>
                            <div class="mb-3">
                                <label for="price">Selling Price</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="Selling Price">
                            </div>
                            <div class="mb-3">
                                <label for="price2">MRP</label>
                                <input id="price2" name="price" type="text" class="form-control" placeholder="MRP">
                            </div>
                            <div class="mb-3">
                                <label for="price4">Tax</label>
                                <input id="price4" name="price" type="text" class="form-control" placeholder="Tax">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Status</label>
                                <select class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Active</option>
                                    <option value="EL">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Brand</label>
                                <select class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Fashion</option>
                                    <option value="EL">Electronic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="manufacturername1">SKU Code</label>
                                <input id="manufacturername1" name="manufacturername" type="text" class="form-control" placeholder="SKU Code">
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Unit</label>
                                <select class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Nos</option>
                                    <option value="EL">Packet</option>
                                    <option value="EL">Box</option>
                                    <option value="EL">Case</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productdesc">Product Description</label>
                                <textarea class="form-control" id="productdesc" rows="5" placeholder="Product Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price1">Purchase Price</label>
                                <input id="price1" name="price" type="text" class="form-control" placeholder="Purchase Price">
                            </div>
                            <div class="mb-3">
                                <label for="price4">Rent Term</label>
                                <input id="price4" name="price" type="text" class="form-control" placeholder="Rent Term">
                            </div>
                            <div class="mb-3">
                                <label for="price5">Video Link</label>
                                <input id="price5" name="price" type="text" class="form-control" placeholder="Video Link">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Product Images</h4>
            </div>
            <div class="card-body">
                <form action="/" method="post" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </form>
            </div>

        </div> <!-- end card-->

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Priorities</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                        <label class="form-check-label" for="formrow-customCheck">Trending Product</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                        <label class="form-check-label" for="formrow-customCheck">Hot Deal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta Data</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Meta title</label>
                                <input id="metatitle" name="productname" type="text" class="form-control" placeholder="Metatitle">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="manufacturername" type="text" class="form-control" placeholder="Meta Keywords">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Related Products</h4>
                <p class="card-title-desc">Search all Related product</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="control-label">Select Releted Products</label>
                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                    <option value="WI">Wireless</option>
                                    <option value="BE">Battery life</option>
                                    <option value="BA">Bass</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
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
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
