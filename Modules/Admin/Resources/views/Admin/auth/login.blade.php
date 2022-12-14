@extends('admin::Admin.layouts.Authentication.master')
@section('title','Login')

@section('content')

@if(Session::has('message'))

<div class="alert alert-success" role="alert">
    <strong>Note!</strong> {{ Session::get('message') }}.
</div>
@endif

<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate"  action="{{route('admin.login')}}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Sign In to Dashboard</h1>
            <!--end::Title-->


        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off"  value="{{old('email')}}"/>
            <span class="text-danger">{{$errors->first("email")}}</span>

            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="{{ route('admin.forgetPassword') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
            <span class="text-danger">{{$errors->first("password")}}</span>
            @if (Session::has('faild'))

            <span class="text-danger">{{Session::get('faild')}}</span>
            @endif



            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit"  class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Continue</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Submit button-->

        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>

@endsection
