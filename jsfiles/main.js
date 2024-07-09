
let navBtn = document.querySelectorAll('button.navBtn'),
    userImg = document.querySelector('.userImg'),
    profileNav = document.querySelector('.profileNav'),
    mobileMenus = document.querySelector('.mobileMenu'),
    bgCover = document.querySelector('.bgCover'),
    settings = document.querySelector('.menuList a.settings'),
    mobileUser = document.querySelector('.menuList a.user'),
    settingItem = document.querySelector('.menuList div .settingItem'),
    MobileprofileNav = document.querySelector('.menuList .profileNav'),
    sliderItems = document.querySelectorAll('.sliderItems .items'),
    sliderDots = document.querySelectorAll('.sliderDots .dots'),
    sliderPre = document.querySelector('.sliderDots button.pre'),
    sliderNext = document.querySelector('.sliderDots button.next'),
    mobileSearchBtn = document.querySelector('header.topBar .right .mobileSearchBtn'),
    header = document.querySelector('header.topBar'),
    shareBtn = document.querySelectorAll('.shareOpenBtn'),
    shareSection = document.querySelector('.shareSection');
    darkBtn = document.querySelector('.settingItem label input');


$('button.navBtn').click(mobileMenu);
$('.bgCover').click(mobileMenu)


$('.shareOpenBtn').click(function(){
    $('.shareSection').toggleClass('show');
})

$('.menuList a.settings').click(function(){
    $('.menuList div .settingItem').toggleClass('show');
    $(this).toggleClass('active')
})


$('.menuList a.user').click(function() {
    $('.menuList .profileNav').toggleClass('show');
});


$('.userImg').click(function() {
    $('.userProfile .profileNav').toggleClass('show');
});


$('header.topBar .right .mobileSearchBtn').click(function(){
    $('header.topBar').toggleClass('srchMob');
});


// dark btn

$('.settingItem label input').click(function(){
    if(this.checked) {
        document.body.classList.add('dark');
        $('body').addClass('dark');
    }
    else {
        $('body').removeClass('dark');
    }
})

function mobileMenu()
{
    $('button.navBtn').toggleClass('show');
    $('.mobileMenu').toggleClass('show');
}