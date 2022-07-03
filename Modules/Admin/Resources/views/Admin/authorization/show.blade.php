@extends('Dashboard.master')
@section('page_title','Show Role')
@section('nav_title','Show Role')

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
										<li class="breadcrumb-item text-dark"> View {{$role->name}}</li>
										<!--end::Item-->
									</ul>


@endsection
@section('content')

	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="mb-0">{{$role->name}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        @if ($role->permissions->count()==0)
                        <div class="card-body pt-0">
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                <div class="d-flex align-items-center py-2">
                                 No Permissions Assign

                            </div>

                            </div>
                            <!--end::Permissions-->
                        </div>
                         @else
                         @foreach ($role->permissions as $permission )
                         <div class="card-body pt-0">
                             <!--begin::Permissions-->
                             <div class="d-flex flex-column text-gray-600">
                                 <div class="d-flex align-items-center py-2">
                                 <span class="bullet bg-primary me-3"></span>
                                  {{$permission->name}}

                             </div>

                             </div>
                             <!--end::Permissions-->
                         </div>
                         @endforeach
                        @endif


                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-0">
                            <a type="button" class="btn btn-light btn-active-primary" href="{{route('admin.roles.edit',$role->id)}}" >Edit Role</a>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->

                    <!--end::Modal-->
                </div>
                <!--end::Sidebar-->
                {{--  Start Component Admins Belong To Roles --}}
                <!--begin::Content-->

                  <rolesadmin-component  :role="{{$role->id}}"></rolesadmin-component>

                {{-- End Component Admins Belong To Roles --}}

                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection

@section('js')
<script src="{{asset('assets/js/custom/apps/user-management/roles/view/view.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/roles/view/update-role.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

@endsection
