<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }

        .header,.footer{
            width: 100%;
            background: #2f3f51;
            padding: 5px;
            color: white;
        }

        .footer{
            position: absolute;
            bottom:0;
        }

        .logo img{
            height: 30px;
        }

        .main-containt{
            padding: 10px;
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .main-containt span{
            display:flex;
            border-bottom: 1px solid gray;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <h1>REEN</h1>
        </div>
    </div>

    <div class="main-containt">
        <span>Name: <strong>{{$details['name'] }}</strong></span> 
        <span>Email: <strong>{{ $details['email'] }}</strong></span>
        <span>Message: {{ $details['message'] }}</span>
    </div>

    <div class="footer">
        <div>
            © 2014 REEN. All rights reserved.
        </div>
    </div>
</body>
</html>