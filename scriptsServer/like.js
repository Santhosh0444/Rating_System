$(document).ready(function () {
    events = 'dislike';

    $('.likeDislike .like').click(function () {
        likeShow('like', 'true');
    });

    $('.likeDislike .dislike').click(function () {
        likeShow('dislike', 'true');
    });

    setInterval(function () {
        likeShow();
        allCommants();
    }, 1000);

    function likeShow(events = '', click = 'false') {
        productLink = $('input.productLink').val();
        $.ajax({
            url: 'phpScripts/like.php',
            method: 'post',
            type: 'post',
            dataType: 'html',
            data: { events, productLink },
            success: function (e) {
                data = e.split(',');
                clsName = data[0];
                likes = data[1];
                dislikes = data[2];
                if (clsName == 'error' && click == 'true') {
                    popAlerts(`
                <div class="error con">
                    <span>Sign in to ${events}</span>
                    <span class="canAlert">&times;</span>
                </div>`);
                }
                else {
                    eventNow = data[3];

                    if (eventNow == 'like') {
                        if (clsName == 'active') {
                            $('.likeDislike .like').addClass('active');
                        }
                        else {
                            $('.likeDislike .like').removeClass('active');
                        }
                        $('.likeDislike .dislike').removeClass('active');
                    }
                    else {
                        if (clsName == 'active') {
                            $('.likeDislike .dislike').addClass('active');
                        }
                        else {
                            $('.likeDislike .dislike').removeClass('active');
                        }
                        $('.likeDislike .like').removeClass('active');
                    }
                }

                $('.likeDislike .like').html(likes);
                $('.likeDislike .dislike').html(dislikes);
            }
        })
    }
})