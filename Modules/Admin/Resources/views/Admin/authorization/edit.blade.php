@extends('Dashboard.master')
@section('page_title','Edit Role')
@section('nav_title','Edit Role')

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
                                        <li class="breadcrumb-item text-muted">
											<a href="{{route('admin.roles')}}" class="text-muted text-hover-primary">Roles</a>
										</li>
                                        <li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark"> Edit {{$role->name}}</li>
										<!--end::Item-->
									</ul>


@endsection
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        @if (Session::has('success'))

        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor"></path>
                    <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-bold">
                    <div class="fs-6 text-gray-700">
                      {{Session::get('success')}}
                  </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>

        @endif


        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Edit Role</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">

                <!--begin::Form-->
                <form id="kt_account_profile_details_form" class="form" action="{{route('admin.roles.update',$role->id)}}" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Role Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Role Name" value="{{$role->name}}" />
                                    </div>


                                </div>
                                <!--end::Row-->
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->



                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="">Permissions</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="permissions[]" aria-label="Select a Permissions" data-control="select2" data-placeholder="Select a Permissions" class="form-select form-select-solid form-select-lg fw-bold" multiple>
                                    <option value="">Select a Permissions...</option>
                                    @foreach ($permissions as $permission )

                                    <option  value="{{$permission->id}}"

                                        @foreach ($role->permissions as $permissionrole )
                                        {{$permissionrole->id==$permission->id ? 'selected':''}}

                                        @endforeach
                                        >

                                        {{$permission->name}}

                                    </option>


                                    @endforeach


                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->


    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
