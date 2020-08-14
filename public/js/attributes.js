$(document).ready(function () {
    // fill inputs with previously set attribute values
    axios.get(window.location.href.replace('edit', 'attributes'))
        .then( response => {
            let data = Object.entries(response.data);

            data.forEach( ([attribute_id, value]) => {
                let valuedInput = $(`[data-attr_id=${attribute_id}]`);

                if (typeof value == 'boolean') {
                    valuedInput.prop('checked', value);
                    valuedInput.closest('.js-attr-container').find('input:checkbox.js-attribute-toggle')
                        .prop('checked', value);
                }

                valuedInput.val(value)
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
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
            });
    });

    // submit text and option attribute values with ajax
    $('.js-attr span.btn').click(function () {
        axios.post(window.location.href.replace('edit', 'attributes'), {
            value: $(this).parent().next().val(),
            attribute_id: $(this).parent().next().data('attr_id'),
        })
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
            });
    });
});