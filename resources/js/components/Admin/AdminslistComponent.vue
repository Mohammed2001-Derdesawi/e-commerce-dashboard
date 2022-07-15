<template>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search" v-model="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Admins" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <!-- <select name="" id="" v-model="filter">
                                    <option value="A">NONE</option>
                                </select> -->
                                <select class="form-select form-select-solid fw-bolder"

                                      v-model="filter">
                                    <option value="">None</option>
                                    <option value="0">InActive</option>
                                    <option value="1">Active</option>

                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">
                                    Reset
                                </button>
                                <button   @click="getAdmins" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-customer-table-filter="filter">
                                    Apply
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->

                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_user" @click="getRoles">
                        Add Admin
                    </button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none"
                    data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                        <th class="min-w-125px">Userame</th>
                        <th class="min-w-125px">Email</th>
                        <th class="min-w-125px">Roles</th>
                        <th class="min-w-125px">avatar</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Last Login at</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    <tr v-for="admin in admins" :key="admin.id">

                        <!--begin::Name=-->
                        <td>
                            <a href="" class="text-gray-800 text-hover-primary mb-1">{{
                                    admin.username
                            }}</a>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Email=-->
                        <td>
                            <p class="text-gray-600 text-hover-primary mb-1">
                                {{ admin.email }}
                            </p>
                        </td>
                          <td>
                            <span  v-for=" (role,index) in admin.roles" :key="role.id" class="badge badge-light-primary fs-7 m-1" :class="{'badge-light-primary':index%2==0,'badge-light-danger':index%2==1}">{{role.name}}</span>
                          <span  v-if="admin.roles.lenght==0">--</span>

                        </td>

                        <!--end::Email=-->
                        <!--begin::Company=-->
                        <td>
                            <!-- /public/Galary/admin/avatars/ -->
                            <img v-if="admin.avatar" :src="'/'+admin.avatar" alt="" style="width:70px; height:70px;" />
                            <p v-else>--</p>
                        </td>
                        <!-- avatar -->
                        <!--end::Company=-->
                        <!--begin::Payment method=-->
                        <td>
                            <span v-if="admin.status == 1" class="badge badge-light-primary fs-7 m-1">Active</span>
                            <span v-else class="badge badge-light-danger fs-7 m-1">InActive</span>
                        </td>
                        <!--end::Payment method=-->
                        <!--begin::Date=-->
                        <td>{{ admin.last_login_at }}</td>
                        <!--end::Date=-->
                        <!--begin::Action=-->
                        <td class="text-end">
                            <div class="d-flex justify-content-end flex-shrink-0">
                            <a href="#" class="
                  btn btn-icon btn-bg-light btn-active-color-primary btn-sm
                  me-1
                " @click="changeStatus(admin)" data-toggle="tooltip" data-placement="top" :title="admin.status==1? 'Change Status to  InActive' :  ' Change Status  to Active' ">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.3"
                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" @click="EditAdmin(admin)"  class="
                  btn btn-icon btn-bg-light btn-active-color-primary btn-sm
                  me-1
                ">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3"
                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#"  @click="deleteAdmin(admin)" class="
                  btn btn-icon btn-bg-light btn-active-color-primary btn-sm
                ">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            </div>
                        </td>
                        <!--end::Action=-->
                    </tr>
                </tbody>
                <!--end::Table body-->
            </table>
            <div class="row">
                <div class="
            col-sm-12 col-md-5
            d-flex
            align-items-center
            justify-content-center justify-content-md-start
          "></div>
                <div class="
            col-sm-12 col-md-7
            d-flex
            align-items-center
            justify-content-center justify-content-md-end
          "   v-if="paginate.last_page>1">
                    <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="kt_table_users_previous"
                                v-if="paginate.current_page > 1">
                                <a href="javascript:void(0)" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0"
                                    class="page-link" v-on:click.prevent="changePage(paginate.current_page - 1)"><i
                                        class="previous"></i></a>
                            </li>
                            <li class="paginate_button page-item" v-for="page in pages" :key="page"
                                :class="{ active: page == paginate.current_page }">
                                <a href="javascript:void(0)" aria-controls="kt_table_users" class="page-link"
                                    v-on:click.prevent="changePage(page)">{{ page }}</a>
                            </li>

                            <li class="paginate_button page-item next" id="kt_table_users_next"
                                v-if="paginate.current_page < paginate.last_page">
                                <a href="javascript:void(0)" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0"
                                    class="page-link" v-on:click.prevent="changePage(paginate.current_page + 1)"><i
                                        class="next"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--begin::Modals-->
        <!--begin::Modal - Add task-->
											<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" >
												<!--begin::Modal dialog-->
												<div class="modal-dialog modal-dialog-centered mw-650px">
													<!--begin::Modal content-->
													<div class="modal-content">
														<!--begin::Modal header-->
														<div class="modal-header" id="kt_modal_add_user_header">
															<!--begin::Modal title-->
															<h2 class="fw-bolder">Add Admin</h2>
															<!--end::Modal title-->
															<!--begin::Close-->
															<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																		<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Close-->
														</div>
														<!--end::Modal header-->
														<!--begin::Modal body-->
														<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
															<!--begin::Form-->
															<form id="kt_modal_add_user_form" class="form" action="#" enctype="multipart/form-data " @keydown="removeerror">
																<!--begin::Scroll-->
																<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
																	<!--begin::Input group-->
																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="d-block fw-bold fs-6 mb-5">Avatar</label>
																		<!--end::Label-->
																		<!--begin::Image input-->
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																			<!--begin::Preview existing avatar-->
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url('public/assets/media/avatars/300-6.jpg')"></div>
																			<!--end::Preview existing avatar-->
																			<!--begin::Label-->
																			<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																				<i class="bi bi-pencil-fill fs-7"></i>
																				<!--begin::Inputs-->
																				<input type="file" name="avatar" accept=".png, .jpg, .jpeg" @change="uploadAvatar" />
																				<input type="hidden" name="avatar_remove" @click="removeAvatar" />
																				<!--end::Inputs-->
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
                                                                           <span class="text-danger" v-if=" errors && errors.avatar">{{errors.avatar[0]}}</span>

																	</div>
																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Username</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="text" v-model="admin.username" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" value="Emma44" />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.username">{{errors.username[0]}}</span>
																	</div>
																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Email</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="email" v-model="admin.email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com" />
																		<!--end::Input-->
                                                                        <span class="text-danger" v-if=" errors && errors.email">{{errors.email[0]}}</span>
																	</div>
                                                                    	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Password</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="password" v-model="admin.password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"  />
																		<!--end::Input-->
                                                                        <span class="text-danger" v-if=" errors && errors.password">{{errors.password[0]}}</span>
																	</div>
                                                                    	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Confirm Password</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="password" v-model="admin.password_confirmation" name="password_confirmation" class="form-control form-control-solid mb-3 mb-lg-0"   />
																		<!--end::Input-->
																	</div>
																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="mb-7">
																		<!--begin::Label-->
																		<label class="fw-bold fs-6 mb-5">Roles</label>
																		<!--end::Label-->
																		<!--begin::Roles-->
																		<!--begin::Input row-->
																		<div class="d-flex fv-row" v-for="role in roles" :key="role.id">
																			<!--begin::Radio-->
																			<div class="form-check form-check-custom form-check-solid">
																				<!--begin::Input-->
																				<input class="form-check-input me-3" @click="addRoles(role)"  type="radio" :name="role.name" :value="role.id" :id="'kt_modal_update_role_option_'+role.id"  />
																				<!--end::Input-->
																				<!--begin::Label-->
																				<label class="form-check-label" for="kt_modal_update_role_option_0">
																					<div class="fw-bolder text-gray-800">{{role.name}}</div>
																				</label>
																				<!--end::Label-->
																			</div>
																			<!--end::Radio-->
                                                                            <div class='separator separator-dashed my-5'></div>
																		</div>
																		<!--end::Input row-->







																		<!--end::Roles-->
																	</div>
																	<!--end::Input group-->
																</div>
																<!--end::Scroll-->
																<!--begin::Actions-->
																<div class="text-center pt-15">
																	<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																	<button type="submit" @click.prevent="addAdmin" class="btn btn-primary" id="submitform" data-kt-users-modal-action="submit">
																		<span class="indicator-label">Submit</span>
																		<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</button>
																</div>
																<!--end::Actions-->
															</form>
															<!--end::Form-->
														</div>
														<!--end::Modal body-->
													</div>
													<!--end::Modal content-->
												</div>
												<!--end::Modal dialog-->
											</div>
											<!--end::Modal - Add task-->

        <!--end::Modals-->
    </div>
</template>

<script>
export default {
    name: "AdminsListComponent",


    data() {
        return {
            admins: [],
            paginate: {},
            pages: [],
            search:'',
            admin:{
                username:'',
                email:'',
                password:'',
                password_confirmation:'',
                avatar:'',
                roles:[],
            },
            roles:[],
            errors:{},
            filter:'',
            perpage:15,
        };
    },
    mounted() {
        this.getAdmins()

    },
    methods: {
        getAdmins()
        {

           axios.get("/api/admin/getadmins?paginate="+this.perpage+(this.filter?"&status="+this.filter:'')).then((response) => {
            this.admins = response.data.data;
            this.paginate = response.data.meta;
            this.pages = this.pagesNumbers();
        });
        },
        changePage(page =1) {
            axios.get("/api/admin/getadmins?page=" + page).then((response) => {
                this.admins = response.data.data;
                this.paginate = response.data.meta;
                this.pages = this.pagesNumbers();
            });
        },
        addRoles(role)
        {
            if(!this.admin.roles.includes(role))
            this.admin.roles.push(role)

        },
        pagesNumbers() {
            if (!this.paginate.to) return [];

            let from = this.paginate.current_page - this.paginate.per_page;
            if (from < 1) from = 1;

            let to = from + this.paginate.per_page * 2;
            if (to >= this.paginate.last_page) to = this.paginate.last_page;

            var pagesArray = [];
            for (let page = from; page <= to; page++) {
                pagesArray.push(page);
            }

            return pagesArray;
        },
        changeStatus(admin)
        {
          axios.post('/api/admin/changestaus',admin).then(()=>{
               this.getAdmins()
                this.$Message.success('Status Change Successfull');
                })
                .catch((error)=>{
   this.$Message['error']({
                    background: true,
                    content: 'Server Error'
                });
                })

        },
        uploadAvatar(e)
        {
            this.admin.avatar=e.target.files[0];



        },
        removeAvatar()
        {
            this.admin.avatar='';

        },

        deleteAdmin(admin)
        {
          axios.post('/api/admin/delete',admin).then( ()=>
          {
             this.getAdmins()
                this.$Message.success('Admin deleted Successfull')
          }

          )
                .catch((error)=>{
                this.$Message.success('Admin Not Deleted');

                })

        },
        getRoles()
        {
            axios.get('/api/admin/roles').then((response)=>{
                this.roles=response.data.data
            })
        },
        addAdmin()
        {
            let data=this.fetchDataForm()
            axios.post('/api/admin/store',data)
            .then((response)=>{
                 window.location.reload()

                this.getAdmins()
                this.$Message.success('Admin Added Successfull')
            }).catch(error => {
                 this.errors = error.response.data.errors;


            })
        },
        fetchDataForm()
        {
            let data= new FormData();
            data.append('avatar',this.admin.avatar)
            data.append('username',this.admin.username)
            data.append('email',this.admin.email)
            data.append('password',this.admin.password)
            data.append('password_confirmation',this.admin.password_confirmation)
            for(let role in this.admin.roles)
            data.append('roles[]',this.admin.roles[role].id)
            return data
        },
        removeerror(event)
        {
       delete this.errors[event.target.name];
        },
        EditAdmin(admin)
        {
            window.location.href='/admin/edit/email='+admin.email
        }
    },
    watch:
    {
        search($value)
        {
            if(!this.filter)
         axios.get('/api/admin/getadmins?search='+this.search+'&&paginate='+this.perpage).then((response)=>{
                this.admins = response.data.data;
                this.paginate = response.data.meta;
                this.pages = this.pagesNumbers();
        })
        else
         axios.get('/api/admin/getadmins?search='+this.search+"&&status="+this.status+"&&paginate="+this.perpage).then((response)=>{
                this.admins = response.data.data;
                this.paginate = response.data.meta;
                this.pages = this.pagesNumbers();
        })
        }



    }
};
</script>
