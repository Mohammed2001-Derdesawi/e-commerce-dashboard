<template>
 <div class="flex-lg-row-fluid ms-lg-10">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header pt-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="d-flex align-items-center">Admin Assigned</h2>
                                <span>({{adminsdata.length}})</span>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-roles-table-filter="search" name="search"  v-model="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Admins" />
                                </div>
                                <!--end::Search-->

                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

                                        <th class="min-w-150px">Username</th>
                                        <th class="min-w-125px">Email</th>
                                        <th class="min-w-125px">Created_at</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">

                                    <tr v-if="adminsdata.length==0">
                                        <td>No Admins Assign</td>
                                    </tr>


                                    <tr v-for="admin in adminsdata" :key="admin.id">


                                        <!--begin::Joined date=-->
                                        <td>{{admin.username}}</td>
                                        <td>{{admin.email}}</td>
                                        <td>{{admin.created_at}}</td>
                                        <!--end::Joined date=-->
                                            <!--begin::Action=-->
                        <td class="text-end">
                            <div class="d-flex justify-content-end flex-shrink-0">

                            <a href="" @click.prevent="EditAdmin(admin)"   class="
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
                            <a href="#"  @click.prevent="deleteAdminFromRole(admin)" class="
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
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>

</template>



<script>

export default {
   name:'RolesadminComponent',
   props:['role'],
   data()
   {
    return {
        adminsdata:{},
        paginate:{},
        search:'',
        roleid:this.role,
        pages:[],

    }

   },
   mounted(){
    this.getAdminsRole()


     },
   methods:{
     getAdminsRole()
     {

        axios.get('/api/admin/roles/get/admins',{params:{role:this.roleid}}).then((response) =>{
              this.adminsdata=response.data.data
            this.paginate=response.data.meta
              this.pages = this.pagesNumbers();

        });

     },
      changePage(page =1) {
            axios.get("/api/admin/roles/get/admins?page="+page,{params:{role:this.roleid}}).then((response) => {
                this.adminsdata = response.data.data;
                this.paginate = response.data.meta;
                this.pages = this.pagesNumbers();
            });
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
        deleteAdminFromRole(admin)
        {

            axios.post('/api/admin/roles/admin/delete',{params:[{role:this.role},{email:admin.email}]}).then((response)=>{
                 this.getAdminsRole()
                this.$Message.success('Admin Delete From Role Successfull');
            })
        },

        EditAdmin(admin)
        {
            window.location.href='/admin/edit/email='+admin.email

        },





   },
   watch:{
    search()
    {
        axios.get("/api/admin/roles/get/admins?search="+this.search,{params:{role:this.roleid}}).then((response)=>{
              this.adminsdata = response.data.data;
                this.paginate = response.data.meta;
                this.pages = this.pagesNumbers();
        })
    }
   }
}
</script>
