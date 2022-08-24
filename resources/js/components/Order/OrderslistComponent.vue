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
												<input type="text" v-model="search" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
											</div>
											<!--end::Search-->
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
											
											<div class="w-100 mw-150px">
												<!--begin::Select2-->
												<select v-model="status" id="statusoptions" class="form-select form-select-solid" data-placeholder="Status">
													<option value="" selected>All</option>
													<option  value="Cancelled">Cancelled</option>
													<option value="Completed">Completed</option>
													<option value="Denied">Denied</option>
													<option value="Expired">Expired</option>
													<option value="Failed">Failed</option>
													<option value="Pending">Pending</option>
													<option value="Processing">Processing</option>
													<option value="Refunded">Refunded</option>
													<option value="Delivered">Delivered</option>
													<option value="Delivering">Delivering</option>
												</select>
												<!--end::Select2-->
											</div>
										
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

													<th class="min-w-100px">Order ID</th>
													<th class="min-w-175px">User</th>
													<th class="text-end min-w-70px">Status</th>
													<th class="text-end min-w-100px">Total</th>
													<th class="text-end min-w-100px">Date Added</th>
													<th class="text-end min-w-100px">Date Modified</th>
													<th class="text-end min-w-100px">Actions</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-bold text-gray-600">
												<!--begin::Table row-->
                                                <tr v-if="orders.length==0">
                                                    <td class="d-flex align-items-center">No Orders Found</td>
                                                </tr>
												<tr v-for="order in orders" :key="order.id">

													<!--begin::Order ID=-->
													<td >
														<a href="../../demo8/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bolder">{{order.id}}</a>
													</td>
													<!--end::Order ID=-->
													<!--begin::Customer=-->
													<td>
														<div class="d-flex align-items-center">

															<div class="text-end pe-0">
																<!--begin::Title-->
																<a href="../../demo8/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{order.user.name}}</a>
																<!--end::Title-->
															</div>
														</div>
													</td>
													<!--end::Customer=-->
													<!--begin::Status=-->
													<td class="text-end pe-0" >
														<!--begin::Badges-->
														<div class="badge badge-light-info " :class="order.status">{{order.status}}</div>
														<!--end::Badges-->
													</td>
													<!--end::Status=-->
													<!--begin::Total=-->
													<td class="text-end pe-0">
														<span class="fw-bolder">${{order.total}}</span>
													</td>
													<!--end::Total=-->
													<!--begin::Date Added=-->
													<td class="text-end">
														<span class="fw-bolder">{{order.created_at}}</span>
													</td>
													<!--end::Date Added=-->
													<!--begin::Date Modified=-->
													<td class="text-end" >
														<span class="fw-bolder">{{order.updated_at}}</span>
													</td>
													<!--end::Date Modified=-->
													<!--begin::Action=-->
													<td class="text-end">
														<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="../../demo8/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="../../demo8/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
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
                                                    <div class="dataTables_length" id="kt_ecommerce_sales_table_length">
                                                        <label>
                                                            <select  v-model="perpage"  class="form-select form-select-sm form-select-solid">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50" selected>50</option>
                                                                <option value="100">100</option
                                                                ></select>
                                                                </label>
                                                                </div>
                                                                </div>




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
    name:'OrderslistComponent',
    data()
    {
        return {
            orders:{},
            paginate:{},
            pages:[],
            search:'',
            status:'',
            perpage:15,
        }
    },
    mounted()
    {
        this.getOrders()

    },
    methods:
    {
        getOrders(page=1)
        {
            if(this.status =='')
             axios.get('/api/admin/orders/?page='+page+'&search='+this.search+'&&paginate='+this.perpage).then(response=>{
            this.orders=response.data.data
             this.paginate = response.data.meta;
            this.pages = this.pagesNumbers();
        }).catch(error=>{
            console.error(error)
        })
        else
              axios.get('/api/admin/orders/?page='+page+'&search='+this.search + '&status='+this.status+'&&paginate='+this.perpage).then(response=>{
            this.orders=response.data.data
             this.paginate = response.data.meta;
            this.pages = this.pagesNumbers();
        }).catch(error=>{
            console.error(error)
        })
        },
           changePage(page =1) {
                this.getOrders(page)
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

    },
    watch:{
        search()
        {
            this.getOrders()
        },
        status()
        {
            this.getOrders()
        },
        perpage()
        {
          this.getOrders()
        }
    },



}





</script>
<style scoped>
.Completed{
    color: #50cd89 !important;
    background-color: #e8fff3 !important;

}
.Expired{
       color: #f1416c !important;
    background-color: #fff5f8 !important;
}
.Processing{
    color: #009ef7 !important;
   background-color: #f1faff !important;

}
.Pending{
    color: #ffc700 !important;
   background-color: #fff8dd !important;

}
.Delivered{
    color: #009ef7 !important;
background-color: #f1faff !important;

}
.Denied{
      color: #f1416c !important;
    background-color: #fff5f8 !important;

}
.Delivering{
     color: #50cd89 !important;
     background-color: #e8fff3 !important;

}
.Failed{
    color: #f1416c !important;
    background-color: #fff5f8 !important;
}
.Delivered{
     color: #50cd89 !important;
    background-color: #e8fff3 !important;

}
.Refunded{
    color: #7239ea !important;
    background-color: #f8f5ff !important;

}
.Cancelled{
    color: #f1416c !important;
    background-color: #fff5f8 !important;
}
</style>


