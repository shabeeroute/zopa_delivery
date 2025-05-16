@extends('layouts.master')
@section('title') @lang('translation.Add_Rental_type') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Catalogue_Manage') @endslot
@slot('li_2') @lang('translation.Rental_type_Manage') @endslot
@slot('title') @lang('translation.Add_Rental_type') @endslot
@endcomponent
<div class="row">
    <form method="POST" action="{{ isset($rental_type)? route('admin.rental_types.update') : route('admin.rental_types.store')  }}" enctype="multipart/form-data">
        @csrf
        @if (isset($rental_type))
            <input type="hidden" name="rental_type_id" value="{{ encrypt($rental_type->id) }}" />
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
                                    <label for="name">Rental Type Name</label>
                                    <input id="name" name="name" type="text" class="form-control"  placeholder="Rental Type Name" value="{{ isset($rental_type)?$rental_type->name:old('name')}}">
                                    @error('name') <p>{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name_ar">Rental Type Name Arabic</label>
                                    <input id="name_ar" name="name_ar" type="text" class="form-control"  placeholder="Rental Type Name Arabic" value="{{ isset($rental_type)?$rental_type->name_ar:old('name_ar')}}">
                                    @error('name_ar') <p>{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                {{-- <div class="mb-3">
                                    <label class="control-label">Parent Category</label>
                                    <select id="parent" name="parent" class="form-control select2">
                                        <option value="">Select</option>
                                        @foreach ($rental_types as $rental_type_p )
                                            <option value="{{ $rental_type_p->id }}" {{ isset($rental_type)&&($rental_type->parent==$rental_type_p->id)?'selected':''}}>{{ $rental_type_p->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label class="control-label">Rental Type Image</label>
                                    <span id="imageContainer" @if(isset($rental_type)&&empty($rental_type->image)) style="display: none" @endif>
                                        @if(isset($rental_type)&&!empty($rental_type->image))
                                            <img src="{{ URL::asset(App\Models\RentalType::DIR_STORAGE . $rental_type->image) }}" alt="" class="avatar-xxl rounded-circle me-2">
                                            <button type="button" class="btn-close" aria-label="Close"></button>
                                        @endif
                                    </span>

                                    <span id="fileContainer" @if(isset($rental_type)&&!empty($rental_type->image)) style="display: none" @endif>
                                        <input id="image" name="image" type="file" class="form-control"  placeholder="File">
                                        @if(isset($rental_type)&&!empty($rental_type->image))
                                            <button type="button" class="btn-close" aria-label="Close"></button>
                                        @endif
                                    </span>
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
                                <input id="meta_title" name="meta_title" type="text" class="form-control" placeholder="Meta Title" value="{{ isset($rental_type)?$rental_type->meta_title:old('meta_title')}}">
                            </div>
                            <div class="mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input id="meta_keywords" name="meta_keywords" type="text" class="form-control" placeholder="Meta Keywords" value="{{ isset($rental_type)?$rental_type->meta_keywords:old('meta_keywords')}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Meta Description">{{ isset($rental_type)?$rental_type->meta_description:old('meta_description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ isset($rental_type) ? 'Update' : 'Add New' }}</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <input name="isImageDelete" type="hidden" value="0">
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
@endsection
