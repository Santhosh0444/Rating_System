<style>
    /* alerts style code here  */

    .alertsMessages {
        position: fixed;
        z-index: 3;
        top: 40px;
        right: 30px;
        max-height: 420px;
        overflow: hidden;
    }

    .alertsMessages>.alerts {
        position: relative;
        animation: loades .2s ease;
        margin-top: 10px;
    }

    @keyframes loades {
        0% {
            opacity: 0;
            transform: translateX(30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .alertsMessages>.alerts>.con {
        height: 50px;
        padding: 5px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-width: 230px;
        font-size: 17px;
        border-radius: 4px;
        color: #fff;
        user-select: none;
        box-shadow: 0 0 2px #222;
    }

    .alertsMessages>.alerts>.con>.canAlert {
        width: 20px;
        height: 20px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: transform .3s linear;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .alertsMessages>.alerts>.con>.canAlert:hover {
        transform: rotate(180deg);
    }

    .alertsMessages>.alerts>.success {
        background: rgb(10, 67, 10);
    }

    .alertsMessages>.alerts>.error {
        background: red;
    }

    @media screen and (max-width: 340px) {
        .alertsMessages {
            right: 10px;
        }

        .alertsMessages>.alerts>.con {
            width: 230px;
        }
    }
</style>

<div class="alertsMessages"></div>

</div>