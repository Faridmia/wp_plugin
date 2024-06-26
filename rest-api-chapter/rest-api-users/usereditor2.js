jQuery(document).ready(function($) {
    var get_user_data;
    (get_user_data = function() {
        $.ajax({
            url: Slug_API_Settings.root + 'wp/v2/users/' + Slug_API_Settings.current_user_id + '?context=edit',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', Slug_API_Settings.nonce);
            }
        }).done(function(user) {
            $('#username').html('<p>' + user.name + '</p>');
            $('#email').val(user.email);
        });
    })();

    $('#profile-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: Slug_API_Settings.root + 'wp/v2/users/' + Slug_API_Settings.current_user_id,
            method: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', Slug_API_Settings.nonce);
            },
            data: {
                email: $('#email').val(),
            }
        }).done(function(response) {
            console.log(response);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus, errorThrown);
            console.log(jqXHR.responseText);
        });
    });
});
