@extends('admin::Admin.layouts.Authentication.master')
@section('title','Reset Password')

@section('content')

<!--begin::Wrapper-->
<div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" action="{{ route('admin.updatePassword') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <input type="hidden" value="{{ $token }}" name="token" />
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Setup New Password</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">

                

                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="password"
                        name="password" autocomplete="off" />
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group=-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="confirm password"
                name="confirm_password" autocomplete="off" />
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
        </div>
        <!--end::Input group=-->
        <!--begin::Action-->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->

@endsection