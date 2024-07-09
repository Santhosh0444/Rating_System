

$(document).ready(function() {

    // register Form
    $('form.register button.btn').click(function(e){
        e.preventDefault();
        let formData = new FormData($('form.register')[0]);
        let xml =  new XMLHttpRequest();
        xml.open('post', 'phpScripts/register.php', true);
        xml.onload = function() {
            if (xml.status == 200 && xml.readyState == 4) {
                if(xml.responseText == 'steponeSuccess'){
                    $('.firstSection').removeClass('show');
                    $('.secondSection').addClass('show');
                    $('form.register button.btn').html('Register');
                }
                else if(xml.responseText == 'steptwoSuccess'){

                    $('form.register button.btn').addClass('load');
                    $('form.register button.btn').html('');

                    setTimeout(function () {
                        $('form.register button.btn').removeClass('load');
                        $('form.register button.btn').html('Success');
    
                        popAlerts(`<div class="success con">
                            <span>Registered Successfully</span>
                            <span class="canAlert">&times;</span>
                        </div>`);
						
						uploadSuccess($('.registerPage .feildBox input[type="file"]'), $('.filePlaceholder'), $('.filePlaceholder span:nth-child(2)'), 'uploaded', false);
						$('form.register input').val('');
    
                        setTimeout(function () {
                            $('form.register button.btn').html('Next');
                            $('.firstSection').addClass('show');
                            $('.secondSection').removeClass('show');
    
                            toggleNav($('.displayContainer')[0], 'reg');
							$('div.main').removeClass('active');
                            $('.displayContainer button.btn').html('Register');
    
                            popAlerts(`
                                <div class="success con">
                                    <span>Login!!!</span>
                                    <span class="canAlert">&times;</span>
                                </div>`);
                        }, 2000);
    
                    }, 2500);
                }
                else {
                    popAlerts(xml.responseText);
                }
            }
        }
        xml.send(formData);
    })
})


