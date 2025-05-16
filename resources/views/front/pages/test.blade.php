@extends('front.layouts.master')
@section('title') @lang('translation.Home_Page') @endsection

@section('content')

    @component('front.components.breadcrumb')
        @slot('title') Customer page @endslot
        @slot('li_1') Login & Register @endslot
        @slot('bg_img', 'assets/images/gallery-2.jpg')
    @endcomponent

@endsection
