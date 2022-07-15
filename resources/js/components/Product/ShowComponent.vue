<template>
	<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
    			 <div class="card mb-5 mb-xl-8" >

                                   <div class="card-body pt-0">
 <div class = "main-wrapper">

            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img :src = "'/storage/'+product.images[0].path" alt = "">
                    </div>
                    <div class = "hover-container">
                        <div v-for="img in product.images" :key="img.id"><img :src = "'/storage/'+img.path"></div>

                    </div>
                </div>
                <div class = "product-div-right">
                    <span class = "product-name">{{product.name}}</span>
                    <span class = "product-price">Brand : {{product.brand.name}}</span>
                    <div class = "product-rating">
                        <span v-for="star in product.stars" :key="star.id"><i class = "fas fa-star"></i></span>


                        <span>({{product.rates}} ratings)</span>
                    </div>
                    <h2 style="margin-top:16px;">Description</h2>
                    <p class = "product-description">{{description}}</p>
                   <div class = "product-detail">
            <!-- <h2>Description</h2>
              {{product.description}} -->
            <h2 style="margin-top:16px;">Attributes</h2>
            <ul>
              <li v-for="(attr,index) in attributes_varients" :key="attr.id"><i class = "fas fa-check-circle attr"></i>{{Object.keys(varientsprod[0].varient)[index]}}: <span v-for="(value,index2) in attr.values" :key="value.id">{{value}} {{index2==attr.values.length-1? '': ','}}</span></li>
              <li><i class = "fas fa-check-circle attr"></i>Available: <span>{{product.status ? 'in stock' : 'out of stock'}}</span></li>
              <li><i class = "fas fa-check-circle attr"></i>Category: <span style="font-size:12px;">{{product.category.name}}</span></li>
              <div v-if="varients.lenght==1">
              <li ><i class = "fas fa-check-circle attr"></i>Price: <span style="font-size:12px;">{{varients[0].price}}</span></li>
              <li ><i class = "fas fa-check-circle attr"></i>Quantity: <span style="font-size:12px;">{{varients[0].quantity}}</span></li>
              <li ><i class = "fas fa-check-circle attr"></i>Sku: <span style="font-size:12px;">{{varients[0].sku}}</span></li>
              </div>
            </ul>
          </div>
                </div>
            </div>

    </div>
                                   </div>
                </div>

                                       <div class="card mb-5 mb-xl-8" v-if="attributes_varients.length>0 && varients.length>0">
									<!--begin::Header-->
									    <div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bolder fs-3 mb-1">Varients</span>
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
															<input  class="text-dark form-control text-hover-primary d-block mb-1 fs-6" disabled :value="varients[index].price" style ="height:30px !important;" />
														</td>
														<td>
															<input  class="text-dark  form-control text-hover-primary d-block mb-1 fs-6" disabled :value="varients[index].quantity"  style ="height:30px !important;"/>
														</td>
														<td>
															<input  class="text-dark  form-control  text-hover-primary d-block mb-1 fs-6" disabled :value="varients[index].sku" style ="height:30px !important;"/>
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
</div>
    </div>


</template>

<script>
export default {
    name:'ShowComponent',

   props:{
    prod:Object,
  },
  computed: {
  	description() {
        let regex = /(<([^>]+)>)/ig;

	return this.product.description.replace(regex, "");
    }
},
  mounted()
  {
    this.product.stars=Math.trunc(this.product.stars)
    this.getProduct()
    this.previewVarients()

  },
    data() {
        return {

            product:this.prod,
               attributes_varients:[

        ],
        varients:[],
            varientsprod:[],

        }

    },
    methods:{
           getProduct()
    {



        for(let index in this.product.varients)
        {


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









    },

    previewVarients()
    {

         if(this.attributes_varients.length!=0)
         {
            this.varients=[]
	var object = this.attributes_varients.reduce(
  (obj, item) => Object.assign(obj, { [item.attribute]: item.values }), {});


let attrs = [];
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
				price: this.varientsprod[x]!=undefined ? this.varientsprod[x].price : 0,
				quantity:this.varientsprod[x]!=undefined  ? this.varientsprod[x].quantity: 0,
				sku:this.varientsprod[x]!=undefined  ? this.varientsprod[x].sku :0,

			})


		 }


}

         }






    },
    }
}

</script>

<style scoped>
.attr{
    margin-right: 6px;
}
img{
    width: 100%;
    display: block;
}
.main-wrapper{
    min-height: 100vh;
    /* background-color: #f1f1f1; */
    display: flex;
    align-items: center;
    justify-content: center;
}
.container{
    max-width: 1200px;
    padding: 0 1rem;
    margin: 0 auto;
}
.product-div{
    margin: 1rem 0;
    padding: 2rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    background-color: #fff;
    border-radius: 3px;
    column-gap: 10px;
}
.product-div-left{
    padding: 20px;
}
.product-div-right{
    padding: 20px;
}
.img-container img{
    width: 409px;
    margin: 0 auto;
}
.hover-container{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin-top: 32px;
}
.hover-container div{
    /* border: 2px solid #2d2d43; */
    padding: 1rem;
    border-radius: 3px;
    margin: 0 4px 8px 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.active{
    border-color: rgb(255, 145, 163)!important;
}
.hover-container div:hover{
    border-color: rgb(255, 145, 163);
}
.hover-container div img{
    width: 92px;
    cursor: pointer;
}
.product-div-right span{
    display: block;
}
.product-name{
    font-size: 26px;
    margin-bottom: 22px;
    font-weight: 400;
    letter-spacing: 1px;
    opacity: 0.9;
    color: black;
}
.product-price{
    font-weight: 700;
    font-size: 15px;
    opacity: 0.9;
    font-weight: 500;
}
.product-rating{
    display: flex;
    align-items: center;
    margin-top: 12px;
}
.product-rating span{
    margin-right: 6px;
}
.product-description{
    font-weight: 18px;
    line-height: 1.6;
    font-weight: 300;
    opacity: 0.9;
    margin-top: 22px;
    word-wrap: anywhere;
    font-size: 15px;
}
.btn-groups{
    margin-top: 22px;
}
.btn-groups button{
    display: inline-block;
    font-size: 16px;
    /* font-family: inherit; */
    text-transform: uppercase;
    padding: 15px 16px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-groups button .fas{
    margin-right: 8px;
}
.add-cart-btn{
    background-color: #FF9F00;
    border: 2px solid #FF9F00;
    margin-right: 8px;
}
.add-cart-btn:hover{
    background-color: #fff;
    color: #FF9F00;
}
.buy-now-btn{
    background-color: #000;
    border: 2px solid #000;
}
.buy-now-btn:hover{
    background-color: #fff;
    color: #000;
}

@media screen and (max-width: 992px){
    .product-div{
        grid-template-columns: 100%;
    }
    .product-div-right{
        text-align: center;
    }
    .product-rating{
        justify-content: center;
    }
    .product-description{
        max-width: 400px;
        margin-right: auto;
        margin-left: auto;
    }
}

.fa-solid, .fas{
    color: #FF9F00;
}

@media screen and (max-width: 400px){
    .btn-groups button{
        width: 100%;
        margin-bottom: 10px;
    }
}

.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 0.9rem;
    padding: 0.3rem;
    opacity: 0.8;
}
.product-detail ul{
    margin: 1rem 0;
    font-size: 0.9rem;
}
.product-detail ul li{
    display: flex;
    justify-content: start;
    margin:5px 0;
    list-style: none;
    background-size: 18px;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}
.product-detail ul li span{
    font-weight: 400;
}


body{
    background-color: #f5f8fa  !important;
    height: 100%;
margin: 0;
padding: 0;
font-size: 13px !important;
font-weight: 400;
font-family: Poppins,Helvetica,sans-serif;
}

</style>
