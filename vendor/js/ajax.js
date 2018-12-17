$(function () {
    function parseError(text, sign = 'in') {
        if (sign == 'in') {
            $('.error-sign-in').fadeIn('slow');
            $('.error-sign-in span').text(text);
        } else {
            $('.error-sign-up').fadeIn('slow');
            $('.error-sign-up span').text(text);
        }
    }
    function parseSuccess(text,sign = 'in') {
       if(sign == 'in'){
           $('.error-sign-in').hide();
           $('.success-sign-in').fadeIn('slow');
           $('.success-sign-in span').text(text);
       }else{
           $('.error-sign-up').hide();
           $('.success-sign-up').fadeIn('slow');
           $('.success-sign-up span').text(text);
       }
    }
    var sign_inBtn = $('.sign-in-btn');
    var sign_upBtn = $('.sign-up-btn');
    sign_inBtn.on('click', function () {
        var signIn_username_or_email = $('.sign-in-limiter input[name=username_or_email]').val();
        var signIn_password = $('.sign-in-limiter input[name=password]').val();
        var format = 'default';
        var formatCheck = signIn_username_or_email.indexOf('@');
        if (formatCheck != '-1') {
            format = 'email';
        }
        $.ajax({
            url: 'sign.php',
            type: 'POST',
            data: {'signIn': true, 'signInUsrEmail': signIn_username_or_email, 'signPassword': signIn_password, 'format': format},
            success: function (value) {
                var parse = $.parseJSON(value);
                if(parse.case === true){
                    parseSuccess(parse.text);
                    setTimeout(function(){ window.location = 'http://localhost/c-login/success.php'; }, 1000);
                }else{
                    parseError(parse.text);
                }
            }
        }, 'json')
    });
    sign_upBtn.on('click', function () {
        var username = $('.sign-up-limiter input[name=username]').val();
        var email = $('.sign-up-limiter input[name=email]').val();
        var password = $('.sign-up-limiter input[name=password]').val();
        var passwordVerify = $('.sign-up-limiter input[name=password_verify]').val();
        $.ajax({
            url: 'sign.php',
            type: 'POST',
            data: {'signUp': true, 'username': username, 'email': email, 'password': password, 'passwordVerify': passwordVerify},
            success: function (value) {
                var parse = $.parseJSON(value);
                if(parse.case === true){
                    parseSuccess(parse.text,'up');
                    setTimeout(function(){ window.location = 'http://localhost/c-login/success.php'; }, 1000);
                }else{
                    parseError(parse.text,'up');
                }
            }
        }, 'json')
    });
});