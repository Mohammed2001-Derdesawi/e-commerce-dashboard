// Init quill editor
const initQuill = () => {
    // Define all elements for quill editor
    const elements = [
        '#kt_ecommerce_add_product_description',
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
                ]
            },
            placeholder: 'Type your text here...',
            theme: 'snow' // or 'bubble'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            $("#product_description").val(quill.container.firstChild.innerHTML);
            console.log($("#product_description"))
        });

    });
}
