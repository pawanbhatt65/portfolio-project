<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Register</title>
</head>

<body>
    <p style="margin-bottom: 15px;">Dear {{ $userRegister->name }},</p>


    <p style="margin-bottom: 15px;">
        You are succesfully registered. Please
        <a href="{{ env('APP_URL') }}verify-mail?code={{ $userRegister->user_register_id }}">click</a>
        here to activate your account.
    </p>

    <p style="margin-bottom: 8px;">Regards,</p>
    <p>{{ env('APP_NAME') }}</p>
</body>

</html>
