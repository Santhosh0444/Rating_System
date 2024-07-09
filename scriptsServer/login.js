

$('form.login input.emailInput').on('input', function() {
    let email = $(this).val();
    $.ajax({
        url: 'phpScripts/loginDemo.php',
        type: 'post',
        method: 'post',
        dataType: 'text',
        data: {email},
        success: function(e) {
            if (e == 'notFount') {
                showImage(false)
            }
            else {
                showImage(true, e);
            }
        }
    });
});


$('form.login button.btn').on('click', function(e) {
    let form = $('form.login').serialize();
    e.preventDefault();
    $.ajax({
        url: 'phpScripts/login.php',
        type: 'post',
        method: 'post',
        dataType: 'html',
        data: form,
        success: function(e) {
            if (e == 'success') {
                $('form.login button.btn').addClass('load');
                $('form.login button.btn').html('');
                setTimeout(function () {
                    $('form.login button.btn').removeClass('load');
                    $('form.login button.btn').html('Success');

                    popAlerts(`<div class="success con">
                <span>Logined Successfully</span>
                <span class="canAlert">&times;</span>
            </div>`)

                    setTimeout(function () {
                        $('form.login button.btn').html('login');
                        $('form.login input').val('');
                        popAlerts(`
                <div class="success con">
                    <span>Loading...</span>
                    <span class="canAlert">&times;</span>
                </div>`);
                        showImage(false);
                        location.href = 'index.php';
                    }, 2000);

                }, 2500);
            }
            else {
                popAlerts(e);
            }
        }
    });
})


function showImage(t, i = null) {
    t == true ? $('.userImg').addClass('show') : $('.userImg').removeClass('show');
    if (i != null) {
        img = "Asserts/Users_DB_Images/" + i;
        $('.userImg').css('background-image', `url(${img})`)
    }
}