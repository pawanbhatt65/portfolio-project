<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password Mail</title>
</head>

<body>
    <p>Dear {{ $data['name'] }},</p>
    <p>Please <a href="{{ env('APP_URL') }}reset-password?token={{ $data['user_register_id'] }}">click</a> here to
        reset your
        password.</p>
    <p>Regards,<br />{{ env('APP_NAME') }}</p>
</body>

</html>
