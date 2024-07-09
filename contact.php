<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/main.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>

    <style>
        .contact-main {
            position: relative;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }

        .contact-title {
            width: 100%;
        }

        .contact-title h3 {
            text-align: center;
            height: 40px;
            line-height: 40px;
            font-size: 1.3em;
            margin: 10px 0;
        }

        p {
            line-height: 25px;
            text-align: justify;
        }

        .contact-title h3:before {
            content: '';
            position: absolute;
            width: 200px;
            height: 4px;
            background-color: blue;
            margin-top: 35px;
            display: block;
            text-align: center;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 50%;
        }

        .contact-message {
            width: 90%;
            margin: 0 auto;
            line-height: 20px;
        }

        .contact-field {
            position: relative;
            display: block;
            width: 100%;
        }

        .contact-form {
            position: relative;
            margin: 0 auto;
            background-color: blue;
            padding: 15px;
        }

        .contact-field iframe {
            width: 100%;
            border: 0;
        }

        @media screen and (max-width: 730px) {
            .contact-field iframe {
                min-height: 1100px;
            }
        }

        @media screen and (max-width: 350px) {
            .contact-field iframe {
                min-height: 1200px;
            }

            .contact-title h3 {
                font-size: 1.1em;
            }
        }

        a.mail {
            color: blue;
        }
    </style>
</head>

<body>
    <?php include ('header.php') ?>
    <main class="main">
        <div class="contact-main">
            <div class="contact-title">
                <h3>Contact US</h3>
            </div>
            <div class="contact-message">
                <p>If you face any sort of problems in using this website or any of the tools which are offered here you
                    can
                    contact me at any time in the day.</p>
                <p>You can contact me at my email id <code
                        style="font-family: Poppins, sans-serif;"><a class="mail" href="mailto:santhoshyadav116@gmail.com">santhoshyadav116@gmail.com</a></code>
                    to ask your doubts about the services</p>
                <p>And thanks very much for visiting the website. You can go to our <a
                        href="https://techbytehome.blogspot.com/p/privacy-policy.html">privacy policy</a>.</p>
            </div>
            <div class="contact-field"> <iframe
                    src="https://docs.google.com/forms/d/e/1FAIpQLSextXNJOFYwbWAw3VHi0PWIc0bIvugL5EQfKPtm6wJo-4bmPA/viewform?embedded=true">Loading…</iframe>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>