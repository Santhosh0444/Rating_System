
$(document).ready(function(){

    $('form').on('submit', function(e){
        e.preventDefault();
    });

    $('.productBtn>button').click(function(e){
        let form = document.querySelector('form.formFeild');
        let formdata = new FormData(form);

        let xml = new XMLHttpRequest();
        xml.open('post', 'phpScripts/product_Details.php', true);
        xml.onload = function() {
            if(xml.status == 200 && xml.readyState == 4)
            {
                if(xml.response == 'uploaded'){
                    popAlerts(`<div class="success con">
                    <span>uploaded successfully</span>
                    <span class="canAlert">&times;</span>
                </div>`);

                setTimeout(function(){
                    location.href = 'index.php';
                },1000);

                }
                else{
                    popAlerts(xml.response);
                }
            }   
        }

        xml.send(formdata);
    });
})