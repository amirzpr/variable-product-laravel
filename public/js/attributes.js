$(document).ready( function () {
    // fill inputs with previously set attribute values
    axios.get(window.location.href.replace('edit', 'attrs'))
        .then( response => {
            // boolean values
            $('input:checkbox[data-attr_id]').each( function () {
                $(this).prop('checked', response.data[$(this).data('attr_id')][0]);

                $(this).closest('.js-attr-container').find('input:checkbox.js-attribute-toggle')
                    .prop('checked', this.checked);
            });

            // text values
            $('textarea[data-attr_id]').each( function () {
                $(this).val(response.data[$(this).data('attr_id')][0]);
            });

            // single selection values
            $('select:not([multiple])[data-attr_id]').each( function () {
                $(this).val(response.data[$(this).data('attr_id')][0]);
            });

            // multi selection values
            $('select[multiple][data-attr_id]').each( function () {
                $(this).val(response.data[$(this).data('attr_id')]);
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
        axios.post(window.location.href.replace('edit', 'attrs/bool'), {
            value: this.checked,
            attribute_id: $(this).data('attr_id'),
        })
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
            });
    });

    // submit selectable attribute value with ajax
    $('.js-attr select').change(function () {
        axios.post(window.location.href.replace('edit', 'attrs/select'), {
            option_id: $(this).val(),
            attribute_id: $(this).data('attr_id'),
        })
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
            });
    });

    // submit multi-selection attribute value with ajax
    $('.js-attr-multi span.btn').click(function () {
        axios.post(window.location.href.replace('edit', 'attrs/multi-select'), {
            options: $(this).parent().next().val(),
        })
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
            });
    });

    // submit text attribute value with ajax
    $('.js-attr-text span.btn').click(function () {
        axios.post(window.location.href.replace('edit', 'attrs/text'), {
            value: $(this).parent().next().val(),
            attribute_id: $(this).parent().next().data('attr_id'),
        })
            .then( response => {
                console.log(response);
            })
            .catch( error => {
                console.log(error);
                alert(error.response.data.message);
            });
    });
});