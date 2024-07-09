$(document).ready(function () {
    $('.newReviewForm button.subBtn').click(function (e) {
        let form = $('.newReviewForm .fromReview form.formReview').serialize();
        e.preventDefault();
        $.ajax({
            url: 'phpScripts/newRate.php',
            method: 'post',
            type: 'post',
            dataType: 'text',
            data: form,
            success: function (e) {
                if (e == 'posted') {
                    popAlerts(`<div class="success con">
                                <span>Success</span>
                                <span class="canAlert">&times;</span>
                            </div>`);
                    $('.newReviewForm').toggleClass('show');
                    allCommants();
                }
                else if (e == 'updated') {
                    popAlerts(`<div class="success con">
                    <span>Successfully updated</span>
                    <span class="canAlert">&times;</span>
                </div>`);
                $('.newReviewForm').toggleClass('show');
                allCommants();
                }
                else {
                    popAlerts(e);
                }
            }
        });
    });
});
