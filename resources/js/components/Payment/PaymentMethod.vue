<template>
	<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
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
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text"  v-model="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Payments Method" />
											</div>
											<!--end::Search-->
										</div>
										<!--begin::Card title-->
										
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body py-4">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

													<th class="min-w-125px">ID</th>
													<th class="min-w-125px">Icon</th>
													<th class="min-w-125px">Name</th>
													<th class="min-w-125px">Status</th>
													<th class="text-end min-w-100px">Actions</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold">
												<!--begin::Table row-->
												<tr v-for="method in payments" :key="method.id">

													<!--begin::User=-->
													<td class="d-flex align-items-center">
                                                          {{method.id}}
													</td>
													<td><img v-if="method.icon" :src="method.icon" alt="" class="symbol symbol-50px" width="80px" height="80px" /></td>
                                                     <td>
														<div class="badge badge-light fw-bolder">{{method.name}}</div>
													</td>
													<!--end::Last login=-->

													<!--end::User=-->
													<!--begin::Role=-->
													<!--end::Role=-->
												<td>{{method.status ?  "enable" : 'disabled' }}</td>
													<!--begin::Two step=-->

													<!--begin::Joined-->
												   <!--begin::Action=-->
                        <td class="text-end">
                            <div class="d-flex justify-content-end flex-shrink-0">

                            <button  @click="editPayment(method)"  data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user"  class="
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
                            </button>
                         
                            </div>
                        </td>
                        <!--end::Action=-->
												</tr>
												<!--end::Table row-->

											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
                                                                    <div class="row">
                                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                                    <div class="dataTables_length">
                                                        <label>
                                                            <select  v-model="perpage"  class="form-select form-select-sm form-select-solid">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option
                                                                ></select>
                                                                </label>
                                                                </div>
                                                                </div>




             <div class="
          col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"   v-if="paginate.last_page>1">
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
									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>

                        


                                                 <!--begin::Modal - Add task-->
											<div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true" >
												<!--begin::Modal dialog-->
												<div class="modal-dialog modal-dialog-centered mw-650px">
													<!--begin::Modal content-->
													<div class="modal-content">
														<!--begin::Modal header-->
														<div class="modal-header" id="kt_modal_edit_user_header">
															<!--begin::Modal title-->
															<h2 class="fw-bolder">Update Payment Method</h2>
															<!--end::Modal title-->
															<!--begin::Close-->
															<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" @click="removeModal">
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
															<form id="kt_modal_edit_user_form" class="form" action="#" @keydown="removeerror">
																<!--begin::Scroll-->
																<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header" data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
                                                   <span class="text-danger text-center">{{message}}</span>


                                                                    <div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">User Name</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="text" v-model="payment.username" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="username"  />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.username">{{errors.username[0]}}</span>
																	</div>

																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Password</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="text" v-model="payment.password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="password"  />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.password">{{errors.password[0]}}</span>
																	</div>

																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Secret</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="text" v-model="payment.secret" name="secret" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="secret"  />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.secret">{{errors.secret[0]}}</span>
																	</div>

																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Currency</label>
																		<!--end::Label-->
																		<!--begin::Input-->

																		<input type="text" v-model="payment.currency" name="currency" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="currency"  />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.currency">{{errors.currency[0]}}</span>
																	</div>
																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">Certificate</label>
																		<!--end::Label-->
																		<!--begin::Input-->

																		<input type="text" v-model="payment.certificate" name="certificate" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="currency"  />
																		<!--end::Input-->
                                                                      <span class="text-danger" v-if=" errors && errors.certificate">{{errors.certificate[0]}}</span>
																	</div>

																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="required fw-bold fs-6 mb-2">key</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<input type="text" v-model="payment.key" name="key" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="key"  />
																		<!--end::Input-->
                                                                        <span class="text-danger" v-if=" errors && errors.key">{{errors.key[0]}}</span>
																	</div>
																	 <label class="form-check form-switch form-check-custom form-check-solid">
                                                                        <input v-model="payment.status" class="form-check-input" type="checkbox"  checked="checked">
                                                                        <span class="form-check-label fw-bold text-muted" >status</span>
                                                                    </label>

																</div>
																<!--end::Scroll-->
																<!--begin::Actions-->
																<div class="text-center pt-15">
																	<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																	<button type="submit" @click.prevent="updatePayment" class="btn btn-primary" id="submitform" data-kt-users-modal-action="submit">
																		<span class="indicator-label">Submit</span>

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
							<!--end::Container-->
						</div>
						<!--end::Post-->

</template>

<script>
export default {
    name:'PaymentMethod',
    data()
    {
        return {
            payments:{},
            paginate:{},
            perpage:10,
            pages:[],
            payment:{
                id:'',
                key:'',
                status:'',
                username:'',
                password:'',
                secret:'',
                certificate:'',
            },
            errors:{},
            search:'',
			message:''


        }
    },
    mounted()
    {
        this.getPayments()
    },
    methods:{

		
        getPayments(page=1)
        {
            axios.get('/api/admin/payments/methods?paginate='+this.perpage + "&&page="+page+  "&&search="+this.search)
            .then(response=>{
			console.log(response.data.data)
            this.payments=response.data.data
             this.paginate = response.data.meta;
            this.pages = this.pagesNumbers();
            })
            .catch(errors =>{
                console.error(errors)
            })

        },
           changePage(page =1) {
            this.getPayments(page)
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


		editPayment(payment)
		{
			this.payment=payment
			
            this.errors={}
		},

        updatePayment()
        {
            let data =new FormData()
            data.append('id',this.payment.id);
            data.append('key',this.payment.key);
            data.append('status',this.payment.status);
            data.append('username',this.payment.username!=null?this.payment.username : '');
            data.append('password',this.payment.password!=null?this.payment.password : '');
            data.append('secret',this.payment.secret!=null?this.payment.secret : '');
            data.append('currency',this.payment.currency!=null?this.payment.currency : '');
            data.append('certificate',this.payment.certificate!=null?this.payment.certificate : '');

             axios.post('/api/admin/payments/method/update/'+this.payment.id,data)
             .then(response=>{
				if(response.status!=220)
				{
                  window.location.reload()
                this.$Message.success('Payment edit Successfull');
				}
				this.message=response.data.message
				
               

            })
            .catch(errors =>{
                 this.errors = errors.response.data.errors;
				 console.log(errors)
            })

        },
        removeerror(event)
        {
       delete this.errors[event.target.name];
        },
        removeModal()
        {
            const modal=document.getElementById('kt_modal_edit_user')
            modal.classList.remove('show')
         modal.removeAttribute('aria-modal')
            modal.removeAttribute('role')
            modal.setAttribute('aria-hidden','true')
            modal.style.display='none'
            const body=document.getElementById('kt_body');
			body.classList.remove('modal-open')
			body.style=''

              let backmodal=document.querySelectorAll(".modal-backdrop")

			  backmodal.forEach(box => {
                box.remove();
                 });

        },
    },
    watch:{
        search()
        {
            this.getPayments()
        },
        perpage()
        {
            this.getPayments()

        }
    }
}
</script>
