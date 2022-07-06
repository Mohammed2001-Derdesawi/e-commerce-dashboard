@extends('Dashboard.master')
@section('page_title', 'Edit Category')





@section('breadcrumb')
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted text-hover-primary">E-commerce</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">Catalog</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">Categories</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">Edit</li>
    <!--end::Item-->
</ul>
@endsection








@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ route('admin.category.update',$category->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
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
                                <div class="image-input-wrapper w-150px h-150px">
                                    <img id="oldImage" src="{{ asset('storage/'.$category->image) }}"
                                        alt="" width="100px" height="100px">
                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <div>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                            value="{{ $category->image }}" onchange="hideImage()" />

                                    </div>
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

                            <br><span class="text-danger">{{ $errors->first('image') }}</span>
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>

                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                @if($category->status == 0)
                                <div class="rounded-circle bg-danger w-15px h-15px"
                                id="kt_ecommerce_add_category_status"></div>
                                @else
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_category_status"></div>
                                @endif

                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select name="status" class="form-select mb-2" data-control="select2"
                                data-hide-search="true" data-placeholder="Select an option"
                                id="kt_ecommerce_add_category_status_select">
                                <option></option>
                                <option {{ $category->status == 0 ? 'selected' : '' }} value="0" selected="selected">Not-Available</option>
                                <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Available</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category status.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
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
                                <label class="required form-label">Category Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-2" placeholder="Category name"
                                    value="{{ $category->name }}" />
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A category name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <div id="kt_ecommerce_add_category_description" name="kt_ecommerce_add_category_meta_description" class="min-h-100px mb-2">
                                    {!! $category->description !!}
                                </div>
                                {{ $errors->first('description') }}
                                <input type="hidden" id="description" name="description" value="{{ $category->description }}">
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the category for increased SEO ranking.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Category-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Categories</label>
                                <!--end::Label-->

                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2"
                                    data-placeholder="Select an option" data-allow-clear="true" name="parent_id">

                                    <option value="">--None--</option>
                                    @foreach ($categories as $sub_category)
                                    <option {{ $sub_category->id == $category->parent_id ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                    @endforeach

                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7 mb-7">Add Sub-Category to a Category (optional).</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Category-->



                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta Title"
                                    value="{{ $category->meta_title }}" />
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise
                                    keywords.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Keywords</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input value="{{ $category->meta_keywords }}" id="kt_ecommerce_add_category_meta_keywords" name="meta_keywords" class="form-control mb-2" />
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a list of keywords that the category is related to. Separate the keywords by adding a comma
                                    <code>,</code>between each keyword.</div>
                                <!--end::Description-->
                            </div>

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('admin.category.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
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
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection


@section('js')
<script>
    initQuill();
    initTagify();
    changeCircleRound();


    function hideImage () {
            document.getElementById('oldImage').style.display = "none";
    }
</script>


@endsection
