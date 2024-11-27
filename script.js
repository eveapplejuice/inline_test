$(document).ready(function ()
{
    $('#search_btn').on('click', function ()
    {
        if ($('.search-wrapper'.length !== 0)) {
            $('.search-wrapper').remove();
        }
        let $inputVal = $('.input-field').val();
        if ($inputVal.length >= 3) {
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {
                    value: $inputVal
                },
                success: function (response)
                {
                    let json = JSON.parse(response);
                    if (json['success'] === 'Y') {
                        $('.row').after(json['html']);
                    } else {
                        $('.row').after(json['error_html']);
                    }
                }
            });
        }
    });
});