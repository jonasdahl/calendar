<!DOCTYPE html>
<html>
<head>
    <title>Kalender</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <style>
    html, body {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        font-weight: 300;
        font-family: 'Lato';
        font-size: 20px;
    }
    .container {
        text-align: center;
        margin-top: 100px;
        max-width: 100%;
    }
    .content {
        text-align: center;
    }
    input[type="text"] {
        font-size: 14px;
        padding: 10px;
        width: 850px;
        display: block;
        margin: 0 auto;
        max-width: 70%;
        font-family: 'Lato';
    }
    input[type="submit"] {
        font-family: 'Lato';
        display: inline-block;
        background-color: #4D90FE;
        background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
        background-image: linear-gradient(top,#4d90fe,#4787ed);
        border: 1px solid #3079ED;
        color: #fff;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        cursor: default;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        line-height: 27px;
        min-width: 54px;
        text-decoration: none;
        margin: 10px 0;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <p>Kopiera in webbadressen till kalendern nedan:</p>
            <form action="" method="post">
                <input type="text" name="url" />
                <input type="submit" value="Konfigurera">
            </form>
        </div>
    </div>
</body>
</html>
