<?php
include 'phpScripts/sessionLoad.php';
?>

<!-- header section -->
<header class="topBar flexBox">
    <div class="left flexBox">
        <button class="navBtn">
            <span></span>
        </button>
        <div class="logo">
            <a href="index.php" title="LOGO">LOGO</a>
        </div>
    </div>
    <div class="middle">
        <div class="srchSecton">
            <div class="inputSection flexBox">
                <input type="search" class="searchBar" placeholder="Search">
                <button class="searchBtn mask-style"></button>
            </div>
            <div class="suggestions" style="display: none;"></div>
        </div>
        <div class="srchBgCover" style="cursor: auto; backdrop-filter: blur(5px)"></div>
    </div>
    <div class="right flexBox">
        <div class="mobileSearchBtn" style="display: none;">
            <button title="Post"><span class="mask-style"></span></button>
        </div>
        <div class="uploadBtn" style="margin-right: 15px;">
            <a href="newProduct.php" title="Post"><span class="mask-style"></span></a>
        </div>
        <div class="userProfile">
            <div class="userImg">
                <a title="User">
                    <img src="<?= $userImg ?>" alt="user">
                </a>
            </div>
            <div class="profileNav">
                <?= $menu ?>
            </div>
        </div>
    </div>
</header>

<!-- navbar Section -->
<nav class="navBar">
    <div class="mobileMenu">
        <div class="mobileMenuItems">
            <div class="mobileLogo flexBox">
                <button class="navBtn">
                    <span></span>
                </button>
                <div class="logo">
                    <a href="#" title="LOGO">LOGO</a>
                </div>
            </div>
            <ul class="mobileItems">
                <li><a href="index.php" class="home active" data-name="Home"></a></li>
                <li><a href="contact.php" class="contact" data-name="contact"></a></li>
                <li><a href="about.php" class="about" data-name="about"></a></li>
                <li><a href="privacy.php" class="privacy" data-name="privacy"></a></li>
                <li><a href="disclaimer.php" class="disclaimer" data-name="disclaimer"></a></li>
            </ul>
        </div>
    </div>
    <div class="bgCover"></div>

    <div class="menuNav">
        <div class="menuList">
            <div><a href="index.php" class="home" data-name="home"></a></div>
            <div><a class="settings" data-name="settings"></a>
                <div class="settingItem">
                    <label>
                        <span>Mode</span>
                        <input type="checkbox">
                    </label>
                </div>
            </div>
            <div><a href="newProduct.php" class="upload" data-name="upload"></a></div>
            <div><a class="share shareOpenBtn" data-name="share"></a></div>
            <div>
                <a class="user" data-name="<?= $fname ?>">
                    <img src="<?= $userImg ?>" alt="<?= $userName ?>" title='<?= $userName ?>'>
                </a>

                <div class="profileNav">
                    <?= $menu ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- share section -->
<div class="shareSection">
    <?php $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; ?>
    <div class="shareBg shareOpenBtn"></div>
    <div class="shareContainer">
        <h3>Share</h3>
        <div class="shareOptions flexBox">
            <a href="whatsapp://send?text=<?= $actual_link ?>" style="--bg: #25D366; --icon: var(--whatsapp);"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>"
                style="--bg: #3b5998; --icon: var(--facebook);" target="_blank"></a>
            <a href="https://twitter.com/home?status=<?= $actual_link ?>" style="--bg: #222; --icon: var(--twitter);"
                target="_blank"></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $actual_link ?>&title=rating system"
                style="--bg: #0077b5; --icon: var(--linkedin);" target="_blank"></a>
            <a href="https://www.instagram.com"
                style="--bg: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); --icon: var(--instagram);"
                target="_blank"></a>
            <a href="mailto:?subject=<?= $actual_link ?>&amp;body=<?= $actual_link ?>"
                style="--bg: gray; --icon: var(--contact);" target="_blank"></a>
            <button data-url="<?= $actual_link ?>" class="clipBoard"
                style="--bg: blue; --icon: var(--clipboard);"></button>
        </div>
        <div class="canBtn">
            <button class="shareOpenBtn">Cancel</button>
        </div>
    </div>
</div>

<style>
    body.dark .suggestions {
        background: #000;
    }

    body.dark .suggestions a:hover {
        background: #393434;
    }

    .suggestions {
        position: absolute;
		background: #fff;
		width: calc(100% - 17px);
		padding: 5px 10px;
		left: 0;
		margin-top: 60px;
		top: 0;
		/*box-shadow: 0 0 3px #333;*/
		border-radius: 30px;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
		max-height: 300px;
		overflow-y: auto;
    }

    .suggestions a {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px;
        border-radius: 15px;
    }

    .suggestions a:hover {
        background: #0000001c;
    }

    .suggestions a img {
        width: 30px;
        height: 30px;
    }
</style>

<script>
    $('button.clipBoard').click(function () {
        let copyText = $(this)[0].dataset.url;

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText);

        popAlerts(`
                <div class="success con">
                    <span>Copied...</span>
                    <span class="canAlert">&times;</span>
                </div>`);
    });
</script>


<script>
    $('.srchSecton .inputSection input').on('input', function () {
        let val = $(this).val();
        $.ajax({
            url: "phpScripts/search.php",
            method: 'post',
            type: 'post',
            dataType: 'html',
            data: { val },
            success: function (e) {
                if (val != '') {
                    $('.suggestions').html(e);
                    $('.suggestions').css('display', 'block');
                }
                else {
                    $('.suggestions').css('display', 'none');
                }
            }
        })
    })
</script>