<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us mail!</title>
</head>

<body>
    <p style="margin-bottom: 20px;">Hello Admin,</p>
    <p style="margin-bottom: 10px;">New Message from visitor:

    </p>
    <p style="margin-bottom: 20px;">Username: {{ $data['name'] }}
        <br>Email: {{ $data['email'] }}
        <br>Phone: {{ $data['phone'] }}
        <br>Message: {{ $data['message'] }}
    </p>

    <p style="margin-bottom: 8px;">Best Regards,</p>
    <p style="margin-bottom: 10px;">{{ env('APP_NAME') }},</p>
</body>

</html>
