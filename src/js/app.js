window.$ = window.jQuery = require('jquery');

$('.js-enquiryForm').submit(function(e){
    e.preventDefault()
    var form = $(this);
    $.ajax({
        type: "POST",
        url: 'sendEnquiry.php',
        data: form.serialize(), 
        success: function(result)
        {
            var result = JSON.parse(result);
            console.log(result.status);

            if(result.status == 'success') {
                form.trigger("reset").hide();
                $('.js-formSuccess').show();
            }

        }
    });
});