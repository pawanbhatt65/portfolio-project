<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Password Mail</title>
</head>

<body>
    <p>Dear {{ $data['name'] }},</p>
    <p>Your password updated successfully.</p>
    <p>Regards,<br />{{ env('APP_NAME') }}</p>
</body>

</html>
