
$(window).on('scroll', function () {
    $('.mobileReviewBtn').toggleClass('active', this.scrollY > 500);
})

$('.formOpenBtn').click(function () {
    $('.newReviewForm').toggleClass('show');
});


$('.newReviewForm .starReview span').click(function (e) {
    let item = e.target.dataset;
    $('.newReviewForm .starReview span').each(function (index, ele) {
        if (ele.dataset.value <= item.value) {
            ele.style = `
            background: var(--bgColor);
            transform: rotateY(360deg);
            `;
            $('.newReviewForm .ratesBox').val(item.value);
        }
        else {
            ele.style = `
            background: #8b878794;
            transform: rotateY(0deg);
            `;
        }

    })
})
