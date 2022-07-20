@extends('Dashboard.master')
@section('page_title', 'Brands')



@section('breadcrumb')
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted text-hover-primary">E-commerce</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">Catalog</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">Brands</li>
    <!--end::Item-->
</ul>
@endsection



@section('content')

@if(Session::has('message'))
<div class="alert alert-success" role="alert" style="width: 70%; margin-left: 15%;">
    <strong> Note !! </strong><span>{{ Session::get('message') }}</span>
</div>
@endif


<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <brand-component></brand-component>
</div>
<!--end::Content-->


@endsection


@section('js')


@endsection