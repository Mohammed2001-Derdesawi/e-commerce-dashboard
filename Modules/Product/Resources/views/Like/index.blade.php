@extends('Dashboard.master')
@section('page_title','Likes')
@section('nav_title','Likes')
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
                                        <!--begin::Item-->


										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Likes</li>
										<!--end::Item-->
									</ul>


@endsection

@section('css')
<link href="{{asset('assets/Admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    <like-component></like-component>
@endsection
