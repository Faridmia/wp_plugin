
jQuery(document).ready(function($) {
    $.ajax({
        url: Slug_API_Settings.root + 'wp/v2/users/',
        method: 'POST',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', Slug_API_Settings.nonce);
        },
        data: {
            email: 'faridcse7800@gmail.com',
            username: 'faridmia',
            password: 'admin'
        }
    })
    .done(function(response) {
        console.log(response);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Error: ' + textStatus, errorThrown);
        console.log(jqXHR.responseText);
    });
});

  