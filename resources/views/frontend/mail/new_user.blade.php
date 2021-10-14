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
            display: inline-block;
            padding: 10px 27px;
        }
    </style>
</head>
<body>
    <h1>Hello {{ $user->name }}</h1>
    <p>Thanks For Create an Account In our Application</p>
    <hr>
    <h3>Your Login Information :</h3>
    <p>Email : {{ $user->email }}</p>
    <p>password : password</p>
    <p>Please Login Your Account In Our Provide Information.</p>
    <br><br>
    <h5>Best Regurads</h5>
    <p>Developer Biplob</p>
    
</body>
</html>