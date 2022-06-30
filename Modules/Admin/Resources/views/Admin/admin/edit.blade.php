@extends('admin::Admin.layouts.Dashboard.master')
@section('page_title','Edit Admin')
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
											<a href="{{route('admin.index')}}" class="text-muted text-hover-primary">Admins</a>
										</li>
                                        <li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Edit {{$admin->username}}</li>
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
                    <h3 class="fw-bolder m-0">Profile Details</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="" class="collapse show">

                <!--begin::Form-->
                <form id="" class="form" action="{{route('admin.update.base.info',$admin->email)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    @if ($admin->avatar)
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset($admin->avatar)}}')"></div>
                                     @else
                                     <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>

                                    @endif
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                        <span class="text-danger">{{$errors->first('avatar')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">UserName</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="username" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Username" value="{{$admin->username}}" />
                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Row-->
                                <span class="text-danger">{{$errors->first('username')}}</span>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->



                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="">Roles</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="roles[]" aria-label="Select a Roles" data-control="select2" data-placeholder="Select a Roles" class="form-select form-select-solid form-select-lg fw-bold" multiple>
                                    <option value="">Select a Roles...</option>
                                    @foreach ($roles as $role )

                                    <option  value="{{$role->id}}"

                                        @foreach ($admin->roles as $roleadmin )
                                        {{$roleadmin->id==$role->id ? 'selected':''}}

                                        @endforeach
                                        >

                                        {{$role->name}}

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
                        <button type="submit" class="btn btn-primary" id="">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
        <!--begin::Sign-in Method-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Sign-in Method</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_signin_method" class="collapse show">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Email Address-->
                    <div class="d-flex flex-wrap align-items-center">
                        <!--begin::Label-->
                        <div id="kt_signin_email">
                            <div class="fs-6 fw-bolder mb-1">Email Address</div>
                            <div class="fw-bold text-gray-600">support@keenthemes.com</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                            <!--begin::Form-->
                            <form id="" class="form" novalidate="novalidate" method="post" action="{{route('admin.updateadminemail',$admin->email)}}">
                                @csrf
                                <div class="row mb-6">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="fv-row mb-0">
                                            <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter New Email Address</label>
                                            <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="support@keenthemes.com" />
                                        </div>
                                        @if (Session::has('errors'))
                                        <span class="text-danger">{{Session::get('errors')->first('email')}}</span>


                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-0">
                                            <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Confirm Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="confirmemailpassword" />
                                        </div>
                                        @if (Session::has('errors'))
                                        <span class="text-danger">{{Session::get('errors')->first('password')}}</span>


                                        @endif
                                        @if (Session::has('password_faild'))
                                        <span class="text-danger">{{Session::get('password_faild')}}</span>


                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">Update Email</button>
                                    <button id="kt_signin_cancel" type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="kt_signin_email_button" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Email Address-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-6"></div>
                    <!--end::Separator-->
                    <!--begin::Password-->
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <!--begin::Label-->
                        <div id="kt_signin_password">
                            <div class="fs-6 fw-bolder mb-1">Password</div>
                            <div class="fw-bold text-gray-600">************</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                            <!--begin::Form-->
                            <form id="kt_signin_change_password" method="post" class="form" novalidate="novalidate" action="{{route('admin.updateadmipassword',$admin->email)}}">
                               @csrf
                                <div class="row mb-1">

                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="newpassword" />
                                        </div>
                                        @if (Session::has('errors'))
                                        <span class="text-danger">{{Session::get('errors')->first('password')}}</span>


                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="confirmpassword" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                <div class="d-flex">
                                    <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                    <button id="kt_password_cancel" type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="kt_signin_password_button" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Password-->
     >
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Sign-in Method-->

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
@section('js')
         <script src="{{asset('assets/Admin/js/custom/account/settings/signin-methods.js')}}"></script>
		<script src="{{asset('assets/Admin/js/custom/account/settings/profile-details.js')}}"></script>
		<script src="{{asset('assets/Admin/js/custom/account/settings/deactivate-account.js')}}"></script>
		<script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/Admin/js/custom/utilities/modals/offer-a-deal/main.js')}}"></script>

@endsection
