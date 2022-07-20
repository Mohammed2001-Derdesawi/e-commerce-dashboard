<template>
	<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Form-->
								<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
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
												<div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-150px h-150px"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
														<i class="bi bi-pencil-fill fs-7"></i>
														<!--begin::Inputs-->
														<input type="file" name="avatar" @change="savemainimage" accept=".png, .jpg, .jpeg" />
														<input type="hidden"  name="avatar_remove" />
														<!--end::Inputs-->
													</label>
													<!--end::Label-->
													<!--begin::Cancel-->
													<span @click="removemainimage" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
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
												<!--begin::Description-->
												<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
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
													<div class="rounded-circle   w-15px h-15px" id="kt_ecommerce_add_product_status" :class="[ product.status==1 ?  'bg-success ' : 'bg-warning']"  > </div>
												</div>
												<!--begin::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-0">
												<!--begin::Select2-->

                                                    <Select2 v-model="product.status" :options="options" :settings="{ width:'100%' }" />


<!--
												<select class="form-select mb-2" v-model="product.status" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">



													<option value="scheduled">Active</option>
													<option value="inactive">Inactive</option>
												</select> -->
												<!--end::Select2-->
												<!--begin::Description-->
												<div class="text-muted fs-7">Set the product status.</div>
												<!--end::Description-->

											</div>
											<!--end::Card body-->
										</div>
										<!--end::Status-->
										<!--begin::Category & tags-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<!--begin::Card title-->
												<div class="card-title">
													<h2>Product Details</h2>
												</div>
												<!--end::Card title-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-0">
												<!--begin::Input group-->
												<!--begin::Label-->
												<label class="form-label">Categories</label>
												<!--end::Label-->
												<!--begin::Select2-->
                                                <div class=" mb-2">


                                        <Select2 v-model="product.category_id" :options="categories" :settings="{ width:'100%' }" />
                                          </div>

												<!--end::Select2-->
												<!--begin::Description-->
												<div class="text-muted fs-7 mb-7">Add product to a category.</div>
												<!--end::Description-->
												<!--end::Input group-->
												<!--begin::Button-->
												<a href="/admin/category/create" class="btn btn-light-primary btn-sm mb-10">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
														<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->Create new category</a>
												<!--end::Button-->
												<!--begin::Input group-->
												<!--begin::Label-->

												<!--end::Description-->
												<!--end::Input group-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Category & tags-->


									</div>
									<!--end::Aside column-->
									<!--begin::Main column-->
									<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
										<!--begin:::Tabs-->
										<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
											</li>
											<!--end:::Tab item-->
										</ul>
										<!--end:::Tabs-->
										<!--begin::Tab content-->
										<div class="tab-content">
											<!--begin::Tab pane-->
											<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
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
																<label class="required form-label">Product Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" v-model="product.name" name="product_name" class="form-control mb-2" placeholder="Product name" value="" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div>
																<!--begin::Label-->
																<label class="form-label">Description</label>
																<!--end::Label-->
																<!--begin::Editor-->
                                                                 <quill-editor  v-model="product.description"  :options="editorOption"></quill-editor>
																<!-- <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
                                                                <input type="hidden" id="product_description" value="" v-model="product.description" > -->
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set a description to the product for better visibility.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::General options-->
													<!--begin::Media-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Media</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">

															<!--begin::Input group-->
															<div class="fv-row mb-2">
                             <vue-dropzone
      ref="updatevueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      :useCustomSlot="true"

      v-on:vdropzone-removed-file="fileRemoved"
      v-on:vdropzone-file-added="getfile"
      v-on:vdropzone-mounted="assign_images_manually"

    >

     <div class="dz-message needsclick">
																		<!--begin::Icon-->
																		<i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
																		<!--end::Icon-->
																		<!--begin::Info-->
																		<div class="ms-4">
																			<h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
																			<span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
																		</div>
																		<!--end::Info-->
																	</div>

    </vue-dropzone>

															</div>
															<!--end::Input group-->
															<!--begin::Description-->
															<div class="text-muted fs-7">Set the product media gallery.</div>
															<!--end::Description-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Media-->
													<!--begin::Pricing-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Pricing</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input group-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Price</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" :value="product.varients.length<2 ? product.varients[0].price  : ''" name="price" class="form-control mb-2" placeholder="Product price"  />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the product price.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
                                                            	<!--begin::Input group-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Quantity</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text"  :value="product.varients.length<2 ? product.varients[0].quantity  : ''" name="quantity" class="form-control mb-2" placeholder="Product Quantity"  />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the product Quantity.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->

															<!--end::Input group-->
															<!--begin::Input group-->
															<div  class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
																<!--begin::Label-->
																<label class="form-label">Set Discount Percentage</label>
																<!--end::Label-->
																<!--begin::Slider-->
																<div id="kt_ecommerce_add_product_media" class="d-none d-flex flex-column text-center mb-5">
																	<div class="d-flex align-items-start justify-content-center mb-7">
																		<span class=" fw-bolder fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
																		<span class="fw-bolder fs-4 mt-1 ms-2">%</span>
																	</div>
																	<div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
																</div>
																<!--end::Slider-->
																<!--begin::Description-->
																<!--end::Description-->
															</div>
															<!--end::Input group-->

															<!--begin::Tax-->
															<div class="d-flex flex-wrap gap-5">
																<!--begin::Input group-->
																<div class="fv-row w-100 flex-md-root">
																	<!--begin::Label-->
																	<label class="form-label">Tax</label>
																<div class="d-flex justify-content-between">
                                                                    <!--begin::Label-->
                                                                    <div class="fw-bold">
                                                                        <label class="fs-6">Is Product have a tax?</label>
                                                                        <div class="fs-7 text-muted">Product Tax By default will be 25%</div>
                                                                    </div>
                                                                    <!--end::Label-->

                                                                    <!--begin::Switch-->
                                                                    <label class="form-check form-switch form-check-custom form-check-solid" style="margin: 0 80px 0 0;">
                                                                        <input v-model="product.is_tax" class="form-check-input" type="checkbox">
                                                                        <span class="form-check-label fw-bold text-muted" >Yes</span>
                                                                    </label>

                                                                    <!--end::Switch-->
                                                                 </div>
                                                                <div class="text-muted fs-7">or add value of the tax</div>

                                                                                                            <!--end::Select2-->
                                                                    <!--begin::Description-->
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row w-100 flex-md-root" v-if="product.is_tax">
																	<!--begin::Label-->
																	<label class="form-label">VAT Amount (%)</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input type="text" v-model="product.tax" class="form-control mb-2" value="" />
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Set the product VAT about.</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<!--end:Tax-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Pricing-->
												</div>
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::Inventory-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Inventory</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input group-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="form-label">SKU</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input  :value="product.varients.length<2 ? product.varients[0].sku  : ''" type="text" name="sku" class="form-control mb-2" placeholder="SKU Number"  />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Enter the product SKU.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->


														</div>
														<!--end::Card header-->
													</div>
													<!--end::Inventory-->
													<!--begin::Variations-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Variations</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
                                                            	<!--begin::Input group-->
															<div class="fv-row">
																<!--begin::Input-->
																<div class="form-check form-check-custom form-check-solid mb-2">
																	<input v-model="is_has_varient" class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox"  />
																	<label class="form-check-label">Have A variations?</label>
																</div>
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set if the product is have variations</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
                                                            	<div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
															<div class="" data-kt-ecommerce-catalog-add-product="auto-options">
																<!--begin::Label-->
																<label class="form-label">Add Product Variations</label>
																<!--end::Label-->
																<!--begin::Repeater-->
																<div id="">
																	<!--begin::Form group-->
																	<div class="form-group" v-for="(varient,index) in attributes_varients" :key="index" style="margin-bottom:15px;">
																		<div data-repeater-list="kt_ecommerce_add_product_options" class="d-flex flex-column gap-3"  >
																			<div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
																				<!--begin::Select2-->
																				<div class="w-100 w-md-200px">

																					<select class="form-select" v-model="attributes_varients[index].attribute" name="" data-placeholder="Select a variation" >
                                                                                        <option v-if="attributes.length==0" >No Attributes yet </option>
																						<option  v-for="attribute in attributes" :key="attribute.id" :value="attribute.id">{{attribute.name}}</option>

																					</select>
																				</div>
																				<!--end::Select2-->
																				<!--begin::Input-->
                                                                                 <div class="w-100 w-md-400px">
                                                  								<input :id="'tagifyid'+index" @change="addvalue($event,index)" :value="attributes_varients[index].values.join(',')"  name="kt_ecommerce_values_attributes_tagify" :data-kt-tagify="'tagify'+index" class="form-control mb-2" />

                                                                                       </div>


																				<!--end::Input-->
																				<button @click="removevairent(index)" type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
																					<!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																							<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
																							<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</button>
																			</div>
																		</div>
																	</div>
																	<!--end::Form group-->
																	<!--begin::Form group-->
																	<div class="form-group mt-5" v-if="attributes.length>0">
																		<button @click.prevent="pushvarient" type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																				<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->Add another variation</button>
																	</div>

																	<!--end::Form group-->
																</div>
																<!--end::Repeater-->
															</div>
                   		<div class="d-flex justify-content-end" v-if="showsure || attributes_varients.length > 0">
											<!--begin::Button-->
											<a  href="" @click.prevent="cancelvareitns()" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
											<!--end::Button-->
											<!--begin::Button-->
											<button @click.prevent="previewVarients" type="" id="" class="btn btn-primary">
												<span class="indicator-label">Save</span>

											</button>
											<!--end::Button-->
										</div>
                                                                </div>




															<!--end::Input group-->
														</div>
														<!--end::Card header-->
													</div>
                                                    <div class="card mb-5 mb-xl-8" v-if="is_sure &&  attributes_varients.length>0 && varients.length>0">
									<!--begin::Header-->
									    <div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bolder fs-3 mb-1">Perview Varients</span>
										</h3>

									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body py-3">

                                   <div class="card-body pt-0">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
												<!--begin::Table head-->
												<thead>
													<tr class="fw-bolder text-muted">

														<th class="min-w-150px">Varient</th>
														<th class="min-w-140px">price</th>
														<th class="min-w-120px">Quantity</th>
														<th class="min-w-120px">sku</th>
														<th class="min-w-100px text-end">Actions</th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
													<tr v-for="(varinetsobj,index) in varients" :key="index">

														<td>
											<span  class="text-border fw-bolder text-hover-primary  badge badge-light fw-bolder" style="font-size:12px;">
											<span v-for=" (value,index2) in varients[index].values" :key="value.id" >
												{{value}} {{index2 ==varients[index].values.length-1? '': '/'}}
											</span></span>

														</td>
														<td>
															<input  class="text-dark form-control text-hover-primary d-block mb-1 fs-6" v-model="varients[index].price" style ="height:30px !important;" />
														</td>
														<td>
															<input  class="text-dark  form-control text-hover-primary d-block mb-1 fs-6" v-model="varients[index].quantity"  style ="height:30px !important;"/>
														</td>
														<td>
															<input  class="text-dark  form-control  text-hover-primary d-block mb-1 fs-6" v-model="varients[index].sku" style ="height:30px !important;"/>
														</td>

														<td class="text-end">

															<a @click.prevent="deletevairent(index)" href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
													</tr>

												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
                                                                    </div>
										<!--end::Table container-->
									</div>
									<!--begin::Body-->
								</div>
													<!--end::Variations-->
													<!--begin::Shipping-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Shipping</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">

															<!--begin::Shipping form-->
															<div id="kt_ecommerce_add_product_shipping" class=" mt-10">
																<!--begin::Input group-->
																<div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="form-label">Weight</label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	<input v-model="product.weight" type="text" name="weight" class="form-control mb-2" placeholder="Product weight" value="" />
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row">
																	<!--begin::Label-->
																	<label class="form-label">Dimension</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<div class="d-flex flex-wrap flex-sm-nowrap gap-3">

																		<input v-model="product.width" type="number" name="width" class="form-control mb-2" placeholder="Width (w)" />
																		<input type="number"  v-model="product.height" name="height" class="form-control mb-2" placeholder="Height (h)"  />
																		<input type="number"  v-model="product.length" name="length" class="form-control mb-2" placeholder="Lengtn (l)"  />
																	</div>
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Shipping form-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Shipping-->
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
																<input type="text" v-model="product.meta_name" class="form-control mb-2" name="meta_title" placeholder="Meta tag name" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="mb-10">
																<!--begin::Label-->
																<label class="form-label">Meta Tag Description</label>
																<!--end::Label-->
																<!--begin::Editor-->
                                                                 <quill-editor  v-model="product.meta_description"  :options="editorOption"></quill-editor>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div>
																<!--begin::Label-->
																<label class="form-label">Meta Tag Keywords</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<input @change="keywordsadd" v-model="product.meta_keywords" id="kt_ecommerce_add_category_meta_keywords" name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
																<code>,</code>between each keyword.</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Meta options-->
												</div>
											</div>
											<!--end::Tab pane-->
										</div>
										<!--end::Tab content-->
										<div class="d-flex justify-content-end">
											<!--begin::Button-->
											<a href="../../demo8/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
											<!--end::Button-->
											<!--begin::Button-->
											<button @click.prevent="updateProduct"  id="" class="btn btn-primary">
												<span class="indicator-label">Save Changes</span>

											</button>
											<!--end::Button-->
										</div>
									</div>
									<!--end::Main column-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
</template>


<script>
import vue2Dropzone from "vue2-dropzone";
// import "vue2-dropzone/dist/vue2Dropzone.min.css";
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import Select2 from 'v-select2-component';
import { quillEditor } from 'vue-quill-editor'
import axios from 'axios';
export default {
   name:'UpdateproductComponent',
    components: {
    vueDropzone: vue2Dropzone,
    quillEditor:quillEditor,
    Select2:Select2
  },
  props:{
    id:Object,
  },

   data()
   {
    return {
         dropzoneOptions: {
            url:"url",
		duplicateCheck:false,
       autoProcessQueue:false,
       paramName: "file"
       , maxFiles: 10+this.id.images.length,
       maxFilesize: 10,
        addRemoveLinks: !0,
        acceptedFiles: "image/jpeg,image/png,image/gif,image/jpg"
        // accept: function(file, done) {
        //     console.log(file);
        //     if (file.type != "image/jpeg") {
        //       this.fileRemoved(file)
        //       self.$Message.success('File is in correct format')
        //     }
        //     else { done(); }
        // },

      },

        acceptedFiles:['jpg','png','jpeg','gif'],
        config:{
            'placeholder':  'Write Description for Product...',

        },
         editorOption: {
          modules: {
                   toolbar: [
                       [{
                           header: [1, 2, false]
                       }],
                       ['bold', 'italic', 'underline','strong'],
                   ]
               },
        },

        product:this.id,
        attributes_varients:[

        ],
        varients:[],
        options:[],



        attributes:{},
        categories:{},
		is_sure:false,
        showsure:false,
        is_has_varient:false,
         varientsprod:[]


    }


   },

   mounted()
   {


    this.getAttributes()
    this.getCategories()
    this.getProduct()
    this.is_has_varient=this.attributes_varients.length>0
    if(this.is_has_varient)
    {
        let t = document.getElementById("kt_ecommerce_add_product_shipping");
        t.classList.remove("d-none")
        this.is_sure=true
        this.previewVarients()

    }
    this.product.is_tax=this.product.tax==0? false: true

    this.options=this.getoptions()



          new Tagify(document.getElementById('kt_ecommerce_add_category_meta_keywords'),{
             originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
         })


           new Tagify(document.getElementById('tagifyid'+0),{
             originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
         })




   },



   methods:{
    getoptions()
    {
       console.log(this.product)
          return[   {
                id:1,
                text:'Active',
                 selected:this.product.status


             },
             {
                     id:0,
                    text:'Inactive',
                      selected:this.product.status
             }
             ]

    },
    searchselected(){
    for (let i in this.categories.length) {
        if (this.categories[i].id == this.product.category_id) {
           this.categories[i]={id: this.categories[i].id,text:this.categories[i].name,selected :true}
        }
    }
},
    getProduct()
    {
        console.log(this.product)



        for(let index in this.product.varients)
        {

        //    for (const [attr, values] of Object.entries(this.product.varients[index]))
        //        objects.push(this.product.varients[index].attributes.map(v => ({[attr]:v})));
            //   console.log(objects)
     var object= this.product.varients[index].attributes.reduce( (obj ,item) =>{
        if(!obj[item.name])
        {
            obj[item.name]=[]
        }
        let found=false
        let index=0
        for(let key in this.attributes_varients)
        {
            if( item.pivot.attribute_id ==this.attributes_varients[key].attribute)
           {
                  found=true
                  index=key;
                  break;
           }


        }
        if(found)
        {
            if( this.attributes_varients[index].values.indexOf(item.pivot.value)==-1)
            this.attributes_varients[index].values.push(item.pivot.value)

        }
        else
           this.attributes_varients.push({attribute:item.pivot.attribute_id,
           values:[item.pivot.value]
           })

        obj[item.name].push(item.pivot.value)
        console.log(obj)
        return obj

    },

{}
  )

   this.varientsprod.push({
    varient:object,
    price:this.product.varients[index].price,
    quantity:this.product.varients[index].quantity,
    sku:this.product.varients[index].sku,
   })







        }

  console.log(this.varientsprod)


  console.log(this.attributes_varients)






    },
    assign_images_manually()
    {
         let data =new FormData()
        data.append('images',JSON.stringify(this.product.images));
        axios.post('/api/admin/products/images/info',data)
        .then(response=>{
            // console.log(value)
            for( let file in response.data)
            {

                if(!response.data[file].is_main)
                {
                       this.$refs.updatevueDropzone.manuallyAddFile(
                    {id:response.data[file].id, name: response.data[file].name , size:response.data[file].size , lastModified : response.data[file].lastModified ,accepted:true,

                    dataURL: response.data[file].base64,


                    },
                    "/storage/"+response.data[file].path,

                      {
                   addToFiles: true
                }

                    )

                     console.log( this.$refs.updatevueDropzone)
                }
                else
                {

                    axios.get("/storage/"+response.data[file].path,{responseType: 'blob'}).then(response => {

                           let t=new FileReader()
                       t.readAsDataURL(new Blob([response.data]))
                       t.onload=function (e){
                         document.querySelector('.image-input-wrapper').style.backgroundImage="url("+e.target.result + ")"


                       }


                    })

                    }






            }
            console.log('accepeted files ')

            console.log(this.$refs.updatevueDropzone.getAcceptedFiles())

            // let file =



        })




    },

    updateProduct()
    {
        let data =new FormData()


        this.product.varients=this.varients
        let arr=[]
        //  if (this.$refs.updatevueDropzone.getQueuedFiles().length) {
        //   this.$refs.updatevueDropzone.processQueue()
        // }
        // else
        for(let key in this.product.images)
         {
              if(this.product.images[key].id==undefined)
              data.append('images['+key+']',this.product.images[key])
              else
              data.append('oldimages['+key+']',this.product.images[key].id)
            // this.product.images[key]={
            //     name:this.product.images[key].name,
            //     lastModified:this.product.images[key].lastModified,
            //     size:this.product.images[key].size,
            //     type:this.product.images[key].type,
            //     webkitRelativePath:this.product.images[key].webkitRelativePath,

            // }

         }
         this.product.images=[]


        data.append('product',JSON.stringify(this.product));
        if(this.product.mainimage !=undefined)
        data.append('file',this.product.mainimage);



 const headers = { 'Content-Type': 'multipart/form-data' };

        axios.post('/api/admin/products/update',data,{headers}).then(response=>{
        console.log('done');
        })




    },

    getCategories()
    {
         axios.get('/api/admin/categories')
         .then(response=>{
            this.categories=response.data.data
         })
    },

    keywordsadd(e)
    {
        this.product.meta_keywords=e.target.value

    },

    fileRemoved(file, error, xhr) {
    this.product.images=this.$refs.updatevueDropzone.getAcceptedFiles()



    },

    getfile(file)
    {

         console.log(file)

         if(this.acceptedFiles.indexOf(file.name.split('.')[1]) !=-1)
		 {

             console.log(this.$refs.updatevueDropzone.getAcceptedFiles().length)
             if(this.product.images.length<=9 && this.$refs.updatevueDropzone.getAcceptedFiles().length <=9)
			 {
                        setTimeout(()=>{
 this.product.images=this.$refs.updatevueDropzone.getAcceptedFiles()
              console.log(this.product.images)
              },400)


                       console.log(this.product.images)



			 }
             else
             {
                  console.log("test remove file")
				 this.$refs.updatevueDropzone.removeFile(file)
              this.$Message['error']({
                    background: true,
                    content: 'Max of files is 10  invalid'
                })
             }

		 }
        else{
            console.log(1)
              this.$refs.updatevueDropzone.removeFile(file)
              this.$Message['error']({
                    background: true,
                    content: 'File type is invalid'
                })

                }



    },

    pageatribute()
    {
       window.location.href="/admin/attributes"
    },


    previewVarients()
    {

         if(this.attributes_varients.length!=0)
         {
            this.varients=[]
	var object = this.attributes_varients.reduce(
  (obj, item) => Object.assign(obj, { [item.attribute]: item.values }), {});


let attrs = [];
console.log(Object.values(object).length || this.attributes_varients[0].values.length ==0)
if(!Object.values(object).length ==0)
{
for (const [attr, values] of Object.entries(object))
  attrs.push(values.map(v => ({[attr]:v})));

attrs = attrs.reduce((a, b) => a.flatMap(d => b.map(e => ({...d, ...e}))));



         for(let x in attrs)
		 {
            if(!Object.values(attrs[x]).length==0)
			this.varients.push({
				attributes:Object.keys(attrs[x]),
				values:Object.values(attrs[x]),
				price:this.is_sure && this.varientsprod[x]!=undefined ? this.varientsprod[x].price : 0,
				quantity:this.is_sure && this.varientsprod[x]!=undefined ? this.varientsprod[x].quantity: 0,
				sku:this.is_sure && this.varientsprod[x]!=undefined ? this.varientsprod[x].sku :0,

			})

		 }
		 this.is_sure=true
}

         }



    },
    getAttributes()
    {
        axios.get('/api/admin/attributes/all').then(response=>{
            this.attributes=response.data.data
        })
    },
    pushvarient()
    {
    this.attributes_varients.push({attribute:'',
                values:[],
              })
              this.showsure=true



    },


    addvalue(e,index)
    {

        this.attributes_varients[index].values=(e.target.value.split(','))
		if(this.is_sure)
		this.previewVarients()


    },
    removevairent(index)
    {
        this.attributes_varients.splice(index,1)
		if(this.is_sure)
		this.previewVarients()
        if(this.attributes_varients.length==0)
        this.showsure=false

    },
	 deletevairent(index)
    {
        this.varients.splice(index,1)
    },
	cancelvareitns()
	{
		this.is_sure=false
		this.varients=[]
	},
    savemainimage(e)
    {
        this.product.mainimage=e.target.files[0]

    },
    removemainimage()
    {
        this.product.mainimage=''


    },

   },
   watch:{
       attributes_varients()
       {
        setTimeout(()=>{


     for(let x in this.attributes_varients )
    new Tagify(document.getElementById('tagifyid'+x),{
         originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
    });


        },200)

       },
       is_has_varient()
       {
        if(!this.is_has_varient)
        {
            this.attributes_varients=[]

        }

       }
   }

}



</script>

<style scope>
/* .vue-dropzone{
min-height: auto ;
padding: 1.5rem 1.75rem  !important;
text-align: center  !important;
cursor: pointer  !important;
border: 1px dashed #009EF7  !important;
background-color: #F1FAFF  !important;
border-radius: 0.475rem !important;
} */
.dropzone{
  min-height: auto;
padding: 1.5rem 1.75rem;
text-align: center;
cursor: pointer;
border: 1px dashed #009EF7;
background-color: #F1FAFF;
border-radius: 0.475rem !important;

}
.dropzone, .dropzone *{
    box-sizing:border-box
}
.ql-editor{
    padding: 20px 23px 70px;
}
.selection{
  box-sizing: border-box;
  display: inline-block;
  margin: 0;
  position: relative;
    box-sizing: border-box;
cursor: pointer;
display: block;
height: 28px;
-moz-user-select: none;
user-select: none;
-webkit-user-select: none;

}

.vue-dropzone .dz-preview .dz-image img{
    height: 100% !important;
    width: 100% !important;
    object-fit: cover !important;
}
</style>
