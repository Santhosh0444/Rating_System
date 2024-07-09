<style>
    .sliders {
        position: relative;
        background: transparent;
        height: 300px;
        margin: 5px 10px;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }

    body.dark .slidePointers span {
        background: #433f3f;
    }

    .slideContainer {
        position: relative;
        height: 100%;
        width: 100%;
		background: var(--bgColor);
		overflow: hidden;
		border-radius: 5px;
    }

    .sliders:hover::before {
        height: 70px;
    }

    .sliders::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        height: 0px;
        background: linear-gradient(to top, #00000091, transparent);
        z-index: 1;
        pointer-events: none;
        transition: height .1s ease;
    }

    .slideItems {
        position: absolute;
        left: 0;
        top: 0;
        background: transparent;
        width: 100%;
        height: 100%;
        transition: transform .3s ease;
    }

    .slideItems img {
        margin: 2px;
        width: calc(100% - 4px);
        height: calc(100% - 4px);
        object-fit: cover;
    }

    .slideincater {
        display: flex;
        height: 30px;
        justify-content: center;
        position: absolute;
        left: 50%;
        min-width: 50%;
        align-items: center;
        bottom: 2px;
        transform: translateX(-50%);
        gap: 3px;
        z-index: 1;
    }

    .slideincater button {
        width: 15px;
        height: 23px;
        background: linear-gradient(45deg, #222, #444, #222);
        border: 0;
        outline: 0;
        cursor: pointer;
        position: relative;
        color: #fff;
        opacity: 0;
        transform: translateX(var(--gap));
        transition: opacity .3s ease, transform .3s ease;
        border-radius: 2px;
    }

    .slideincater button::before {
        content: '';
        mask-image: url(Asserts/icons/other/next-arrow.svg);
        mask-size: cover;
        mask-position: center;
        mask-repeat: no-repeat;
        background: #fff;
        display: block;
        width: 15px;
        height: 15px;
    }

    .slideincater button.preBtn::before {
        mask-image: url(Asserts/icons/other/back-arrow.svg);
    }

    .sliders:hover .slideincater button {
        opacity: 1;
        transform: translateX(0);
    }

    .slidePointers {
        position: relative;
        display: flex;
        background: #00000094;
        padding: 2px;
        border-radius: 5px;
    }

    .slidePointers span {
        width: 8px;
        height: 8px;
        background: #ffffffc7;
        position: relative;
        display: block;
        border-radius: 8px;
        margin: 0 1px;
        cursor: pointer;
        transition: width .2s ease, background .3s ease;
    }

    .slidePointers span.active {
        width: 16px;
        background: var(--bgColor) !important;
    }
</style>

<div class="sliders">
    <div class="slideContainer">
        <div class="slideItems item1">
            <img src="Asserts/app_images/slide_1.jpg">
        </div>
        <div class="slideItems item2">
            <img src="Asserts/app_images/slide_2.jpg">
        </div>
        <div class="slideItems item3">
			<img src="Asserts/app_images/slide_3.jpg">
		</div>
        <div class="slideItems item4">
			<img src="Asserts/app_images/slide_4.jpg">
		</div>
        <div class="slideItems item5">
			<img src="Asserts/app_images/slide_5.jpg">
		</div>
        <div class="slideItems item6">
			<img src="Asserts/app_images/slide_6.jpg">
		</div>
    </div>
    <div class="slideincater">
        <button class="preBtn" style="--gap: -5px"></button>
        <div class="slidePointers">
            <span class="active"></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <button class="nextBnt" style="--gap: 5px"></button>
    </div>
</div>


<script>
    let sliderTimeout, count = 0;

    $('.preBtn').on('click', slideDown);
    $('.nextBnt').on('click', slideUp);

    $('.slideItems').each((index, element) => {
        element.style.left = index * 100 + '%';
    });

    $('.slidePointers>span').each((key, data) => {
        data.onclick = function () {
            count = key;
            clearInterval(sliderTimeout);
            sliderTimeout = setInterval(slideUp, 2000);
            slideAnimation(count);
        }
    });


    sliderTimeout = setInterval(slideUp, 2000);

    $('.slideContainer').on('mouseenter', function () {
        clearInterval(sliderTimeout);
    })

    $('.slideContainer').on('mouseleave', function () {
        sliderTimeout = setInterval(slideUp, 2000);
    })

    function slideUp() {
        count == 5 ? count = 0 : count++;
        slideAnimation(count);
    }

    function slideDown() {
        count == 0 ? count = 5 : count--;
        slideAnimation(count);
    }

    function slideAnimation(count) {
        $('.slideItems').each((index, element) => {
            element.style.transform = `translateX(-${count * 100}%)`;
        });
        $('.slidePointers>span').each((index, data) => {
            data.classList.remove('active');
        });
        $('.slidePointers>span')[count].classList.add('active')
    }

</script>
</body>