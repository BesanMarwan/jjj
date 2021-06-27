<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body>
<h1>From:{{$data["user_email"]}}</h1>
<h5>Subject:{{$data['subject']}}</h5>
<p>Hello, My name {{$data["user_name"]}} , {{$data["message"]}}</p>

<p>Thank you</p>
</body>
</html>
