@extends('Dashboard.master')
@section('page_title','Orders')
@section('nav_title','Orders Listing')

@section('breadcrumb')
	<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->

										<!--end::Item-->
										<!--begin::Item-->
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>

										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Orders</li>
										<!--end::Item-->
									</ul>


@endsection
@section('content')
   <orderslist-component></orderslist-component>
@endsection

@section('js')

{{-- <script src="{{asset('assets/Admin/plugins/custom/datatables/datatables.bundle.js')}}"></script> --}}
	<!--begin::Page Custom Javascript(used by this page)-->

    <script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/Admin/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/Admin/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
    <!--end::Page Custom Javascript-->


@endsection
