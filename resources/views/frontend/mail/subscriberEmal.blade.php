<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            width: 330px;
            margin: auto;
            padding: 50px 10px;
        }
        h1{
            color: white;
            background: #ff9200;
            display: block;
            padding: 10px 27px;
        }
    </style>
</head>
<body>
    @php
    $explode = explode('@',$subscriber->email);
    $name = $explode[0];
    @endphp

    <h1>Hello {{ $name }}</h1>
    <p>Thanks for Subscribe our blog.</p>
    <p>We are Mail to our all latest Blog in your Email. Thanks and stay with us.</p>
    <br>
    <p>If you want a create an account in our website, Please go to user Register or Login page.</p>
    <br><br>
    <h5>Best Regurads</h5>
    <p>Developer Biplob</p>
    
</body>
</html>