@extends('layouts.master')
@section('title') @lang('translation.Drivers') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.Shipping_Manage') @endslot
@slot('title') @lang('translation.Drivers') @endslot
@endcomponent
@if(session()->has('success')) <p class="text-success">{{ session()->get('success') }} @endif</p>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Drivers List <span class="text-muted fw-normal ms-2">({{ $drivers->count() }})</span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             {{-- <div>
                                 <ul class="nav nav-pills">
                                     <li class="nav-item">
                                         <a class="nav-link active" href="apps-contacts-list" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="apps-contacts-grid" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                     </li>
                                 </ul>
                             </div> --}}
                             <div>
                                 {{-- <a href="{{ route('admin.drivers.create') }}" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a> --}}
                             </div>

                             {{-- <div class="dropdown">
                                 <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <i class="bx bx-dots-horizontal-rounded"></i>
                                 </a>

                                 <ul class="dropdown-menu dropdown-menu-end">
                                     <li><a class="dropdown-item" href="#">Action</a></li>
                                     <li><a class="dropdown-item" href="#">Another action</a></li>
                                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                                 </ul>
                             </div> --}}
                         </div>

                     </div>
                 </div>
                 <!-- end row -->

                 <div class="table-responsive mb-4">
                     <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                         <thead>
                         <tr>
                             {{-- <th scope="col" style="width: 50px;">
                                 <div class="form-check font-size-16">
                                     <input type="checkbox" class="form-check-input" id="checkAll">
                                     <label class="form-check-label" for="checkAll"></label>
                                 </div>
                             </th> --}}
                             <th scope="col">Driver ID</th>
                             <th scope="col">Joining Date</th>
                             <th scope="col">Name</th>
                             <th scope="col">Place</th>
                             <th scope="col">Country</th>
                             <th scope="col">Contact</th>
                             <th scope="col">Email</th>
                             <th scope="col">Rating</th>
                             <th scope="col">Status</th>
                             <th style="width: 80px; min-width: 80px;">View</th>
                             {{-- <th style="width: 80px; min-width: 80px;">Action</th> --}}
                         </tr>
                         </thead>
                         <tbody>
                            @foreach ($drivers as $driver)
                                <tr>
                                    {{-- <th scope="row">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                            <label class="form-check-label" for="contacusercheck1"></label>
                                        </div>
                                    </th> --}}
                                    <td>{{ $driver->id }}</td>
                                    <td>{{ $driver->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        @if(!empty($driver->image))
                                            <img src="{{ URL::asset('storage/drivers/' . $driver->image) }}" alt="" class="avatar-sm rounded-circle me-2">
                                        @else
                                        <div class="avatar-sm d-inline-block align-middle me-2">
                                            <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                                                <i class="bx bxs-user-circle"></i>
                                            </div>
                                        </div>
                                        @endif
                                        <a href="#" class="text-body">{{ $driver->name }}</a>
                                    </td>
                                    <td>{{ $driver->city }}</td>
                                    <td>{{ $driver->country }}</td>
                                    <td>{{ $driver->phone }}</td>
                                    <td>{{ $driver->email }}</td>
                                    <td>
                                        <p class="text-muted float-start me-3">
                                            @for ($x=1;$x<=$driver->my_review; $x++)
                                                <i class="bx bxs-star text-warning"></i>
                                            @endfor
                                            @for ($x=1;$x<=(Utility::MAX_REVIEW_LIMIT-$driver->my_review); $x++)
                                            <span class="bx bxs-star"></span>
                                            @endfor
                                            ({{ $driver->reviews()->count() }})
                                            {{-- <span class="bx bxs-star text-warning"></span>
                                            <span class="bx bxs-star text-warning"></span>
                                            <span class="bx bxs-star text-warning"></span>
                                            <span class="bx bxs-star text-warning"></span>
                                            <span class="bx bxs-star"></span> --}}
                                        </p>
                                       </td>

                                    <td>{{ $driver->Status==Utility::ITEM_ACTIVE? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.drivers.view',encrypt($driver->id))}}" class="btn btn-primary btn-sm btn-rounded" >
                                            Details
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('admin.drivers.edit',encrypt($driver->id))}}" class="dropdown-item"><i class="mdi mdi-eye font-size-16 text-success me-1"></i> Edit</a></li>
                                            <li><a href="{{ route('admin.drivers.destroy',encrypt($driver->id))}}" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
                                            <li><a href="#" class="dropdown-item" data-plugin="delete-data" data-target-form="#form_delete_{{ $loop->iteration }}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
                                                <form id="form_delete_{{ $loop->iteration }}" method="POST" action="{{ route('admin.drivers.destroy',encrypt($driver->id))}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                </form>
                                            <li><a class="dropdown-item" href="{{ route('admin.drivers.changeStatus',encrypt($driver->id))}}"><i class="mdi mdi-cursor-pointer font-size-16 text-success me-1"></i> {{ $driver->status?'Deactivate':'Activate'}}</a></li>
                                        </ul>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                         </tbody>
                     </table>
                     <!-- end table -->
                     <div class="pagination justify-content-center">{{ $drivers->links() }}</div>
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
