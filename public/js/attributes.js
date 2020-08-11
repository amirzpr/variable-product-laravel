$(document).ready(function () {
    // toggle attribute input group with click
    $('h6.js-attribute-toggle').click(function () {
        $(this).closest('.js-attr-title').next().slideToggle()
    }).trigger('click');

    // change boolean attribute hidden checkbox value
    $('input:checkbox.js-attribute-toggle').change(function () {
        let value_input_group = $(this).closest('.js-attr-title').next();

        value_input_group.find('input:checkbox').prop('checked', this.checked).trigger('change');
    });


    // submit boolean attribute value with ajax
    $('input.js-attr:checkbox').change(function () {
        axios.post(window.location.href.replace('edit', 'attrs/bool'), {
            value: this.checked,
            attribute_id: this.dataset.attr_id,
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
        console.log('text')
    });
});