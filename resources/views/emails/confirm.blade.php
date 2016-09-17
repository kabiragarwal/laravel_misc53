<!DOCTYPE html>
<html lang="en">
<head>

    <title>Sign up confirmation</title>

   
</head>
<body id="app-layout">
    <h1>Thanks for signing up</h1>
    
    <p> We just need you to <a href='{{ url("register/confirm/{$user->token}") }}'>confirm your email address</a> real quick!</p>
</body>
</html>
