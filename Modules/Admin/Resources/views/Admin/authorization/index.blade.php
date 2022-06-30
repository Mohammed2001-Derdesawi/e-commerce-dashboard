@extends('admin::Admin.layouts.Dashboard.master')
@section('page_title','Roles')
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
										<li class="breadcrumb-item text-dark">Roles</li>
										<!--end::Item-->
									</ul>


@endsection
@section('content')
	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <div id="kt_content_container" class="container-xxl">
            @php
                $message=Session::has('success')?Session::get('success'):(Session::has('faild')?Session::get('faild'):null);
            @endphp
            @if ($message)

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
                          {{$message}}
                      </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>

            @endif
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                <!--begin::Col-->
                @foreach ($roles as $role )
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{$role->name}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <!--begin::Users-->
                            <div class="fw-bolder text-gray-600 mb-5">Total Permissions with this role: {{$role->permissions_count}}</div>
                            <!--end::Users-->
                            <!--begin::Permissions-->
                            @foreach ($role->permissions as $permission )
                            <div class="d-flex flex-column text-gray-600">
                                <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{$permission->name}}</div>


                            <!--end::Permissions-->
                        </div>
                            @endforeach

                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            <a href="{{route('admin.roles.show',$role->id)}}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                            <a type="button" class="btn btn-light btn-active-light-primary my-1" href="{{route('admin.roles.edit',$role->id)}}" >Edit Role</a>
                            <form action="{{route('admin.roles.delete',$role->id)}}" method="post">
                               @csrf
                                <button type="submit" class="btn btn-light btn-active-light-danger my-1">Delete Role</button>
                            </form>

                        </div>
                        <!--end::Card footer-->
                    </div>
                </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                @endforeach





                <!--begin::Add new card-->
                <div class="ol-md-4">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                <!--begin::Illustration-->
                                <img src="{{asset('assets/Admin/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                                <!--end::Label-->
                            </button>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Add new card-->

            <!--end::Row-->
            <!--begin::Modals-->
                <storerole-component></storerole-component>

            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
{{-- <roleslist-component></roleslist-component> --}}
@endsection

@section('js')
<script src="{{asset('assets/Admin/js/custom/apps/user-management/roles/list/add.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom/apps/user-management/roles/list/update-role.js')}}"></script>
<script src="{{asset('assets/Admin/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom/widgets.js')}}"></script>

@endsection
