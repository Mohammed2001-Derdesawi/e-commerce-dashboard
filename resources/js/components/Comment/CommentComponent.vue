<template>
	<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Products-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header align-items-center py-5 gap-2 gap-md-5">
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-1 position-absolute ms-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input v-model="search" type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search for user Comments" />
											</div>
											<!--end::Search-->
										</div>
										<!--end::Card title-->

									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<!-- <th class="w-10px pe-2">
														<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
															<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
														</div>
													</th> -->
													<th class="min-w-200px">User</th>
													<th class="text-end min-w-70px">Comment</th>
													<th class="text-end min-w-70px">Product</th>

													<th class="text-end min-w-70px">Actions</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-bold text-gray-600">
                                                <tr v-for="comment in comments" :key="comment.id">
													<!--begin::Checkbox-->
													<!-- <td >
														<div class="form-check form-check-sm form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" />
														</div>
													</td> -->
													<!--end::Checkbox-->
													<!--begin::Category=-->
													<td>
														<div class="d-flex align-items-center">
															<!--begin::Thumbnail-->
															<a href="#" class="symbol symbol-50px">
																<span class="symbol-label" style="background-image:url('https://via.placeholder.com/300.png/09f/fff

C/O https://placeholder.com/ ');"></span>
															</a>
															<!--end::Thumbnail-->
															<div class="ms-5">
																<!--begin::Title-->
																<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{comment.user.name!=null ?  comment.user.name  : 'Default user'}}</a>
																<!--end::Title-->
															</div>
														</div>
													</td>
													<!--end::Category=-->




													<!--begin::Rating-->
													<td class="text-end pe-0" data-order="rating-4">
														<div class="rating justify-content-end" style="display:flex; justify-content:space-between">
													      {{comment.body + "..."}}
														</div>
													</td>
													<!--end::Rating-->
													<!--begin::Status=-->
													<td class="text-end pe-0" data-order="Published">
														<!--begin::Badges-->
														<div class="">{{comment.product.name}}</div>
														<!--end::Badges-->
													</td>
													<!--end::Status=-->
													<!--begin::Action=-->

													<td class="text-end">

															<a @click.prevent="deleteComment(comment.id)" href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																<span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																		<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																		<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
														</td>



													<!--end::Action=-->
												</tr>






                                            </tbody>

											<!--end::Table body-->
										</table>
										<!--end::Table-->
                                                                                               <div class="row">
                                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                                    <div class="dataTables_length" id="kt_ecommerce_sales_table_length">
                                                        <label>
                                                            <select  v-model="perpage"  class="form-select form-select-sm form-select-solid">
                                                                <option value="10" selected>10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option
                                                                ></select>
                                                                </label>
                                                                </div>
                                                                </div>





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
                                    class="page-link" v-on:click.prevent="getComments(paginate.current_page - 1)"><i
                                        class="previous"></i></a>
                            </li>
                            <li class="paginate_button page-item" v-for="page in pages" :key="page"
                                :class="{ active: page == paginate.current_page }">
                                <a href="javascript:void(0)" aria-controls="kt_table_users" class="page-link"
                                    v-on:click.prevent="getComments(page)">{{ page }}</a>
                            </li>

                            <li class="paginate_button page-item next" id="kt_table_users_next"
                                v-if="paginate.current_page < paginate.last_page">
                                <a href="javascript:void(0)" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0"
                                    class="page-link" v-on:click.prevent="getComments(paginate.current_page + 1)"><i
                                        class="next"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

									</div>
									<!--end::Card body-->
								</div>
								<!--end::Products-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
</template>


<script>
export default {
    name:'CommentComponent',
    data() {
        return{
            comments:{},
            perpage:25,
            paginate:{},
            search:'',
            pages:[]

        }

    },

    mounted()
    {
        this.getComments()
    },

     methods:{

        getComments(page=1)
        {
            axios.get('/api/admin/comments?page='+page+"&&paginate="+this.perpage+"&&search="+this.search)
            .then(response=>{
                this.comments=response.data.data
              this.paginate=response.data.meta
              this.pages=this.pagesNumbers()

            })


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
        deleteComment(id)
        {
            axios.post('/api/admin/comments/delete/'+id)
            .then(response=>{
                this.getComments()
                this.$Message.success(response.data.message)
            })
            .catch(errors=>{
                 this.$Message['error']({
                    background: true,
                    content: 'Comment Not Found Server Error! '
                });
            })
        }
    },
    watch:{
        search()
        {
            this.getComments()
        },
        perpage()
        {
            this.getComments()
        }

    }
}
</script>
