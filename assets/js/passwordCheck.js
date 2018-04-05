
$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Wachtwoorden zijn gelijk').css('color', 'green');
    } else
        $('#message').html('Wachtwoorden zijn niet gelijk').css('color', 'red');
});