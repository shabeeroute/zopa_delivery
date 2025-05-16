@extends('layouts.master')
@section('title') @lang('translation.Add_Product') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Add Vendor @endslot
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
                                <label for="productname">Full Name</label>
                                <input id="productname" name="productname" type="text" class="form-control"  placeholder="Full Name">
                            </div>


                            <div class="mb-3">
                                <label for="manufacturername">Mobile</label>
                                <input id="manufacturername" name="manufacturername" type="text" class="form-control" placeholder="Mobile">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturername1">Email</label>
                                <input id="manufacturername1" name="manufacturername" type="text" class="form-control" placeholder="Email">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="manufacturername1">Place</label>
                                <input id="manufacturername1" name="manufacturername" type="text" class="form-control" placeholder="Place">
                            </div>

                            <div class="mb-3">
                                <label for="productdesc">Address</label>
                                <textarea class="form-control" id="productdesc" rows="5" placeholder="Address"></textarea>
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
