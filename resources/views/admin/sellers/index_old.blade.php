@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title') @lang('translation.Vednor_List') @endslot
@endcomponent

<div class="row">

    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-plugin="render-tab" data-tab=".sellerdetailsTab" data-target="{{ route('admin.sellers.data', Utility::ITEM_INACTIVE) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Unapproved Seller</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-plugin="render-tab" data-tab=".sellerdetailsTab" data-target="{{ route('admin.sellers.data', Utility::ITEM_ACTIVE) }}"  role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Approved Seller</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane sellerdetailsTab active" role="tabpanel">
                        <table  class="table table-bordered dt-responsive  nowrap w-100 data-table">
                            <thead>
                            <tr>
                                <th>Logo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Vat Number</th>
                                <th>Cr Number</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script> --}}
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/sweetalert.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
//     $(function () {

//         $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });

//         var route = "{{ route('admin.sellers.data') }}";

//         console.log(route);

//         var table = $('.data-table').DataTable({
//                 "aaSorting": [],
//                 processing: true,
//                 serverSide: true,
//                 ajax: route,
//                 columns: [
//                     {
//                         data: 'image',
//                         name: 'image',
//                         orderable: false,
//                         searchable: false
//                     },
//                     {
//                         data: 'first_name',
//                         name: 'first_name',

//                     },
//                     {
//                         data: 'last_name',
//                         name: 'last_name',

//                     },
//                     {
//                         data: 'phone',
//                         name: 'phone',

//                     },
//                     {
//                         data: 'email',
//                         name: 'email',

//                     },
//                     {
//                         data: 'vat_number',
//                         name: 'vat_number',

//                     },
//                     {
//                         data: 'cr_number',
//                         name: 'cr_number',

//                     },
//                     {
//                         data: 'created_at',
//                         name: '',

//                     },
//                     {
//                         data: 'status',
//                         name: 'status',
//                         orderable: false,
//                         searchable: false
//                     },
//                     {
//                         data: 'action',
//                         name: 'action',
//                         width: '12%',
//                         orderable: false,
//                         searchable: false
//                     },
//                 ],
//                 "language": {
//                     "url": "/assets/datatables/lang/{{ config('app.locale') }}.json"
//                 }
//             });

//             $(document).on('click','[data-plugin="render-tab"]',function(e) {
//                 e.preventDefault();
//                 $('.nav-link').removeClass('active');
//                 $(this).addClass('active');
//                 var route = $(this).data('target');
//                 console.log(route);
//                 $('.data-table').DataTable().draw();
//                 var tab_Id = $(this).data('tab');
//                 $(tab_Id).tab('show');
//                 // renderTab(url,tab_Id);
//         });

//     });

//     function changeStatus(warehouse_id) {
//             Swal.fire({
//                 title: 'Are you sure?',
//                 text: "",
//                 type: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: "#113954",
//                 // cancelButtonColor: '#d33',
//                 confirmButtonText: 'Yes'
//             }).then((result) => {

//                 if (result.value) {
//                     $.ajax({
//                         url: "{{ route('admin.sellers.changeStatus') }}",
//                         method: 'POST',
//                         data: {
//                             warehouse_id: warehouse_id,
//                             "_token": "{{ csrf_token() }}",
//                         },
//                         success: function(result) {
//                              if (result == 1) {
//                                  $('.data-table').DataTable().ajax.reload();
//                              }
//                         },
//                         error: function(error) {
//                             $('.data-table').DataTable().ajax.reload();
//                             Swal.fire(
//                                 'Error!',
//                                 error.responseJSON.message,
//                                 'error'
//                             );
//                         },
//                     });
//                 } else {
//                     $('.data-table').DataTable().ajax.reload();
//                 }
//             });
//         }

//         //Delete
//         function deletePost(event) {
//              Swal.fire({
//               title: 'Are you sure you want to delete this record?',
//               icon: "warning",
//               showCancelButton: true,
//               confirmButtonColor: '#113954',
//               confirmButtonText: 'Yes, I am sure!',
//               cancelButtonText: 'No, cancel it!'
//           })
//           .then((isConfirm) => {
//             if (isConfirm.value)
//             {
//                 var id  = event;
//                 let _token   = $('meta[name="csrf-token"]').attr('content');
//                 var url = "{{ route('admin.sellers.destroy', ':id') }}";
//                 url = url.replace(':id', id );
//                             $.ajax({
//                                 url: url,
//                                 type: 'DELETE',
//                                 data: {
//                                 _token: _token
//                                 },
//                                 success: function(response) {
//                                     Swal.fire({
//                                     title: 'Record has been deleted',
//                                     text: response.Delsuccess,
//                                     icon: "success",
//                                     buttons: true,
//                                     dangerMode: true,
//                                     confirmButtonColor: "#113954",
//                                     confirmButtonText: 'Ok',
//                                 })
//                                 .then((willDelete) => {
//                                     if (willDelete) {
//                                         // $("#kt_customers_table").load( "http://localhost:8000/b2b/business-type #kt_customers_table" );
//                                         location.reload();
//                                     }
//                                 });



//                                 }
//                             });

//             }
//             else
//             {
//                 swal.fire('Cancelled', 'Action cancelled', "error");
//                 e.preventDefault();
//         }

//           });
//    }
  </script>
@endsection
