   // Init quill editor
   const initQuill = () => {
       // Define all elements for quill editor
       const elements = [
           '#kt_ecommerce_add_category_description',
           '#kt_ecommerce_add_category_meta_description'
       ];


       // Loop all elements
       elements.forEach(element => {
           // Get quill element
           let quill = document.querySelector(element);


           // Break if element not found
           if (!quill) {
               return;
           }

           // Init quill --- more info: https://quilljs.com/docs/quickstart/
           quill = new Quill(element, {
               modules: {
                   toolbar: [
                       [{
                           header: [1, 2, false]
                       }],
                       ['bold', 'italic', 'underline'],
                       ['image', 'code-block']
                   ]
               },
               placeholder: 'Type your text here...',
               theme: 'snow' // or 'bubble'
           });
           quill.on('text-change', function(delta, oldDelta, source) {
               $("#description").val(quill.container.firstChild.innerHTML);
           });

       });
   }


   //Init tagify
   const initTagify = () => {
       // Define all elements for tagify
       const elements = [
           '#kt_ecommerce_add_category_meta_keywords'
       ];

       // Loop all elements
       elements.forEach(element => {
           // Get tagify element
           const tagify = document.querySelector(element);
           console.log(tagify)

           // Break if element not found
           if (!tagify) {
               return;
           }

           // Init tagify --- more info: https://yaireo.github.io/tagify/
           new Tagify(tagify);
       });
   }


   const changeCircleRound = () => {
       var valStatus = document.getElementById('kt_ecommerce_add_category_status_select').value;

       if (valStatus == 0) {
           document.getElementById('kt_ecommerce_add_category_status').classList.remove("bg-success");
           document.getElementById('kt_ecommerce_add_category_status').classList.add("bg-danger");

       } else {
           document.getElementById('kt_ecommerce_add_category_status').classList.remove("bg-danger");
           document.getElementById('kt_ecommerce_add_category_status').classList.add("bg-success");
       }
   }
