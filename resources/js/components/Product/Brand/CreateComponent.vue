<template>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" @change="uploadImage"/>
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->

                            <br><span class="text-danger" v-if="errors && errors.image">{{errors.image[0]}}</span>
                            <div class="text-muted fs-7">Set the brand thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Brand Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" v-model="brand.name" name="name" class="form-control mb-2" placeholder="Brand name" />
                                    <span class="text-danger" v-if="errors && errors.name">{{errors.name[0]}}</span>

                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A brand name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" @click.prevent="Store" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
</template>


<script>
export default {
    name:'CreateComponent',
    data(){
        return{
            brand:{
                name:'',
                image:'',
            },
            errors:{},
        };
    },

    methods:{
        uploadImage (e){
            this.brand.image = e.target.files[0]
            console.log(this.brand.image);
        },


        Store (){
            console.log(this.brand.image);
            let data=this.fetchDataForm()
            const brand = axios.post('/api/admin/brand/create' , data)
            .then((response) => {
                this.brand.name = ''
                this.brand.image = ''
                window.location.href = '/admin/brands'

            }).catch(error => {
                console.log(brand);
                this.errors = error.response.data.errors;
                console.log(error);
            })





        },

        fetchDataForm()
        {
            let data = new FormData();
            data.append('name',this.brand.name)
            data.append('image',this.brand.image)
            return data
        },
    }
}
</script>



<style>

</style>
