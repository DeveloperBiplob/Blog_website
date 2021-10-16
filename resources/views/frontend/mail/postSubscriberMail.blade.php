<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Post</title>
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
        #btn{
            width: 100px;
            height: 20px;
            border: 1px solid #ff9200;
            background: #ff9200;
            color: aliceblue;
            text-decoration: none;
            padding: 5px 10px;
            display: block;
            margin: 5px 0;
            text-align: center
        }
        #btn:hover{
            border: 1px solid #ff9200;
            color: #000;
            background: #fff;
        }
    </style>
</head>
<body>
    @php
    $explode = explode('@',$subscriber->email);
    $name = $explode[0];
    @endphp

    <h1>Hello {{ $name }}</h1>
    <p>This is our latest post <strong>{{ $post->name }}</strong></p>
    <p>If you interested this post please click here <br> <a id="btn" href="{{ route('single-post', $post->slug) }}">Click Here</a></p>
    <br>
    <p>If you want a create an account in our website, Please go to user Register or Login page.</p>
    <br><br>
    <h5>Best Regurads</h5>
    <p>Developer Biplob</p>
    
</body>
</html>