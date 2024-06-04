<!DOCTYPE html>
<html>
<head>
    <title>Set Your Password</title>
</head>
<body>
    <p>Hi,</p>
    <p>Your information has been verified. Please click the link below to set your password:</p>
    <p><a href="{{ url('/auth/set-password/{token}' . $token) }}">Set Password</a></p>
    <p>Thank you!</p>
</body>
</html>
