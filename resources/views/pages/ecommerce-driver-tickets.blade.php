@extends('layouts.master')
@section('title') @lang('translation.Inbox') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Shipping_Manage') @endslot
@slot('title')@lang('translation.Tickets') @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <!-- Left sidebar -->

        <!-- End Left sidebar -->


        <!-- Right Sidebar -->
        <div class="customer_ticket email-rightbar mb-3">

            <div class="card">
                {{-- <div class="btn-toolbar gap-2 p-3" role="toolbar">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Mark as Unread</a>
                            <a class="dropdown-item" href="#">Mark as Important</a>
                            <a class="dropdown-item" href="#">Add to Tasks</a>
                            <a class="dropdown-item" href="#">Add Star</a>
                            <a class="dropdown-item" href="#">Mute</a>
                        </div>
                    </div>
                </div> --}}
                <ul class="message-list">
                    <li>
                        <div class="col-mail col-mail-1">
                            {{-- <div class="checkbox-wrapper-mail">
                                <input type="checkbox" id="chk19">
                                <label for="chk19" class="toggle"></label>
                            </div> --}}
                            <a href="#" class="title">Peter, me (3)</a>
                            {{-- <span class="star-toggle far fa-star"></span> --}}
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="#" class="subject">Hello – <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                            </a>
                            <div class="date">Mar 6</div>
                        </div>
                    </li>



                </ul>

            </div> <!-- card -->

            <div class="row">
                <div class="col-7">
                    Showing 1 - 20 of 1,524
                </div>
                <div class="col-5">
                    <div class="btn-group float-end">
                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div> <!-- end Col-9 -->

    </div>

</div><!-- End row -->
<!-- End Page-content -->

<!-- Modal -->
<div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="composemodalTitle">New Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="To">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3 email-editor">
                        <div id="email-editor"></div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/email-editor.init.js') }}"></script>

@endsection
