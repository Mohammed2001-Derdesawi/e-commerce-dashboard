@extends('Dashboard.master')
@section('page_title',"$product->name")
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('nav_title','Show Product Details')
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
										<li class="breadcrumb-item text-muted">
											<a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Prodcuts</a>
										</li>
										<!--end::Item-->
                                        <li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>

										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Show Details</li>
										<!--end::Item-->
									</ul>


@endsection


@section('content')
<show-component :prod="{{$product}}"></show-component>


@endsection


@section('js')
<script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/Admin/js/custom/widgets.js')}}"></script>

<script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/Admin/js/custom/widgets.js')}}"></script>
@endsection
