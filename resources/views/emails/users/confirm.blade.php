<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Welcome, {{ $username }}!</p>
            <p>
                To verify your account, please click this link: {{ URL::to('users/confirm', array($token)) }}.
            </p>
            <p>
                Sincerely,
                <br />
                <br />
                CSNades Team
            </p>
    </body>
</html>
