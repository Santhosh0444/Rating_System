
$(document).ready(function () {
    prodcut = $(".fromReview .productLink").val();

    setInterval(function () {
        loadStar(prodcut);
    }, 1000);

    function loadStar(prodcut) {
        $.ajax({
            url: "phpScripts/totRates.php",
            method: "post",
            type: "post",
            dataType: "html",
            data: { prodcut },
            success: function (e) {
                let star = '';
                let rate = parseFloat(e);
                if (e > 0 && e <= 5) {
                    half = parseFloat(e - Math.floor(e));
                    for (i = 1; i <= 5; i++) {
                        if (i <= e) {
                            star += '<span class="fullstar"></span>';
                        }
                        else if (half < 1.0 && half > 0.0) {
                            star += '<span class="halfstar"></span>';
                            half = 0;
                        }
                        else {
                            star += '<span></span>';
                        }
                    }

                }
                else {
                    star = '<span></span><span></span><span></span><span></span><span></span>';
                }

                $('.productDetails .ratings').html(star);
                $('.productDetails .ratings')[0].dataset.rate = rate.toFixed(1);
            }
        });
    }
});