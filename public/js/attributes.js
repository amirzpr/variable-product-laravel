function fetchVariations() {
    axios.get(window.location.href.replace('edit', 'variations'))
        .then( response => {
            document.querySelector('#variations').innerHTML = response.data;
        })
        .then( () => {
            $('#variations input:checkbox').change(function () {
                let group = $(this).closest('.js-variation-group');

                // update "is_variable" field of product attribute based on checkbox
                axios.put(window.location.href.replace(/\d+\/edit/, `variations/${this.id}`), {
                    'is_variable': Boolean(this.checked)
                })
                    .then( response => console.log(response) )
                    .catch( error => console.log(error) );

                // disable or enable input fields based on checkbox value
                group.find('input[type=number],button:submit').prop('disabled', ! this.checked);
            }).trigger('change');


            // submit boolean value price on button click
            $('#variations button.js-boolean-submit').click(function (event) {
                event.preventDefault();

                let price_input = $(this).parent().find('input[type=number]');
                let product_attribute_id = price_input.data('product-attribute-id');

                axios.post(window.location.href.replace(/\d+\/edit/, `variations/${product_attribute_id}`), {
                    price: price_input.val(),
                })
                    .then( response => console.log(response) )
                    .catch( error => console.log(error) )
            });

            // submit option value prices on button click
            $('#variations button.js-options-submit').click(function (event) {
                event.preventDefault();

                let product_attribute_id = this.id;
                let price_inputs = $(this).closest('.js-variation-group').find('input[type=number]');

                let prices = [];
                price_inputs.each(function () {
                    prices.push({
                        option_id: $(this).data('option-id'),
                        price: $(this).val(),
                    })
                });

                axios.post(window.location.href.replace(/\d+\/edit/, `variations/${product_attribute_id}`), {
                    prices: prices,
                })
                    .then( response => console.log(response) )
                    .catch( error => console.log(error) )
            });

        })
}

$(document).ready(function () {
    // fill inputs with previously set attribute values
    axios.get(window.location.href.replace('edit', 'attributes'))
        .then( response => {
            let data = Object.entries(response.data);

            data.forEach( ([attribute_id, value]) => {
                let valuedInput = $(`[data-attr_id=${attribute_id}]`);

                switch (typeof value) {
                    case "boolean":
                        valuedInput.prop('checked', value);
                        valuedInput.closest('.js-attr-container').find('input:checkbox.js-attribute-toggle')
                            .prop('checked', value);
                        break;

                    case "object":
                        valuedInput.val(Object.keys(value));
                        break;

                    default:
                        valuedInput.val(value)
                }
            });
    });


    // toggle attribute input group with click
    $('h6.js-attribute-toggle').click(function () {
        $(this).closest('.js-attr-container').children('.js-attr-input').slideToggle()
    }).trigger('click');

    // change boolean attribute hidden checkbox value
    $('input:checkbox.js-attribute-toggle').change(function () {
        let value_input_group = $(this).closest('.js-attr-container');

        value_input_group.find('input:checkbox[hidden]').prop('checked', this.checked).trigger('change');
    });


    // submit boolean attribute value with ajax
    $('input.js-attr:checkbox').change(function () {
        axios.post(window.location.href.replace('edit', 'attributes'), {
            value: Boolean(this.checked),
            attribute_id: $(this).data('attr_id'),
        })
            .then( response => console.log(response) )
            .catch( error => console.log(error) )
    });

    // submit text and option attribute values with ajax
    $('.js-attr span.btn').click(function () {
        axios.post(window.location.href.replace('edit', 'attributes'), {
            value: $(this).parent().next().val(),
            attribute_id: $(this).parent().next().data('attr_id'),
        })
            .then( response => console.log(response) )
            .catch( error => console.log(error) )
    });


    // variations tab click listener
    $('#variations-tab').click( function () {
        fetchVariations()
    });
});