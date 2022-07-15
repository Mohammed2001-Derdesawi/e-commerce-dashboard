@extends('Dashboard.master')
@section('page_title','Create Product')
@section('css')
<link href="{{asset('assets/Admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
@endsection
@section('nav_title','Create Product')
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
										<li class="breadcrumb-item text-dark">Create Product</li>
										<!--end::Item-->
									</ul>


@endsection


@section('content')


      <storeproduct-component></storeproduct-component>


@endsection

@section('js')
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/Admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
{{-- <script src="{{asset('assets/Admin/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script> --}}
<script src="{{asset('assets/Admin/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset("assets/Admin/js/custom/documentation/forms/select2.js")}}"></script>
{{-- <script src="{{asset("assets/Admin/js/general.js")}}"></script> --}}
<script>

    // new Tagify(document.querySelector('input[data-kt-tagify="tagify"]'));

</script>
@endsection
