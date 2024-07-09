$(document).ready(function(){

    //  text show
    $('.feildBox .eye').click(function() {
        let input = this.parentElement.children[0];
        textShow(input, this,'show');
    });

    // display container
    $('.displayContainer .switchBtn').click(function () {
        toggleNav($('.displayContainer')[0], 'reg');
        $('.main').toggleClass('active');
        $('.displayContainer').hasClass('reg')? $(this).html('Login') : $(this).html('Register');
    });

    
    // file upolad

    $('.registerPage .feildBox input[type="file"]').on('input', function(){
        uploadSuccess($(this), $('.filePlaceholder'), $('.filePlaceholder span:nth-child(2)'), 'uploaded', true);
    });
})