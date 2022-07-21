@extends('Dashboard.master')
@section('page_title','Comments')
@section('nav_title','Comments')
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
										<li class="breadcrumb-item text-dark">Comments</li>
										<!--end::Item-->
									</ul>


@endsection
@section('content')
    <comment-component></comment-component>
@endsection
