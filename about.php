<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/main.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
    <style>
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #fff;
            text-align: center;
        }

        p {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 8px;
        }

        .button:hover {
            background-color: #45a049;
            color: white;
        }
    </style>
</head>

<body>
    <?php include ('header.php') ?>
    <main class="main">
        <div class="header">
            <h1>About Us</h1>
        </div>

        <div class="container">
            <p>Welcome to our website! We are dedicated to providing quality services/products to our customers.</p>
            <p>I am SANTHOSH</p>
            <a href="contact.php" class="button">Contact Us</a>
        </div>
    </main>
    <?php include ('footer.php'); ?>
</body>

</html>