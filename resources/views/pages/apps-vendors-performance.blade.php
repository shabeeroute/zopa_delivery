@extends('layouts.master')
@section('title') @lang('translation.User_List') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Vendors Management @endslot
@slot('title') Vendors Performance @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Vendors List <span class="text-muted fw-normal ms-2">(834)</span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         {{-- <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             <div>
                                 <ul class="nav nav-pills">
                                     <li class="nav-item">
                                         <a class="nav-link active" href="apps-contacts-list" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="apps-contacts-grid" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <div>
                                 <a href="#" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                             </div>

                             <div class="dropdown">
                                 <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <i class="bx bx-dots-horizontal-rounded"></i>
                                 </a>

                                 <ul class="dropdown-menu dropdown-menu-end">
                                     <li><a class="dropdown-item" href="#">Action</a></li>
                                     <li><a class="dropdown-item" href="#">Another action</a></li>
                                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                                 </ul>
                             </div>
                         </div> --}}

                     </div>
                 </div>
                 <!-- end row -->

                 <div class="table-responsive mb-4">
                     <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                         <thead>
                         <tr>
                             <th scope="col" style="width: 50px;">
                                 <div class="form-check font-size-16">
                                     <input type="checkbox" class="form-check-input" id="checkAll">
                                     <label class="form-check-label" for="checkAll"></label>
                                 </div>
                             </th>
                             <th scope="col">Name</th>
                             <th scope="col">Email</th>
                             <th scope="col">View Detail</th>

                         </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                         <label class="form-check-label" for="contacusercheck1"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Phyllis Gatlin</a>
                                 </td>

                                 <td>phyllisgatlin@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>
                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck2">
                                         <label class="form-check-label" for="contacusercheck2"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">James Nix</a>
                                 </td>

                                 <td>jamesnix@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck3">
                                         <label class="form-check-label" for="contacusercheck3"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Darlene Smith</a>
                                 </td>

                                 <td>darlenesmith@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck4">
                                         <label class="form-check-label" for="contacusercheck4"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <div class="avatar-sm d-inline-block align-middle me-2">
                                         <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                                             <i class="bx bxs-user-circle"></i>
                                         </div>
                                     </div>
                                     <a href="#" class="text-body">William Swift</a>
                                 </td>

                                 <td>williamswift@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck5">
                                         <label class="form-check-label" for="contacusercheck5"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <div class="avatar-sm d-inline-block align-middle me-2">
                                         <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                                             <i class="bx bxs-user-circle"></i>
                                         </div>
                                     </div>
                                     <a href="#" class="text-body">Kevin West</a>
                                 </td>

                                 <td>kevinwest@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                         <label class="form-check-label" for="contacusercheck6"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Tommy Hayes</a>
                                 </td>

                                 <td>tommyhayes@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck7">
                                         <label class="form-check-label" for="contacusercheck7"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Diana Owens</a>
                                 </td>

                                 <td>dianaowens@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck8">
                                         <label class="form-check-label" for="contacusercheck8"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-9.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Paul Sanchez</a>
                                 </td>

                                 <td>paulsanchez@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck9">
                                         <label class="form-check-label" for="contacusercheck9"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-9.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Peter Dryer</a>
                                 </td>

                                 <td>peterdryer@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck10">
                                         <label class="form-check-label" for="contacusercheck10"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Gerald Moyer</a>
                                 </td>

                                 <td>geraldmoyer@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                             <tr>
                                 <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck11">
                                         <label class="form-check-label" for="contacusercheck11"></label>
                                     </div>
                                 </th>
                                 <td>
                                     <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-sm rounded-circle me-2">
                                     <a href="#" class="text-body">Gail McGuire</a>
                                 </td>

                                 <td>gailmcGuire@Dason.com</td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                        View Performance
                                    </button>
                                </td>

                             </tr>
                         </tbody>
                     </table>
                     <!-- end table -->
                 </div>
                 <!-- end table responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
@endsection
