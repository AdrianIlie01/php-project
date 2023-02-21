{{--<?php--}}
{{--echo "<link rel='stylesheet' type='text/css' href='resources/css/registerForm.css' />";--}}
{{--?>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link href="{{ URL::asset('loginForm.css') }}" rel="stylesheet">
    <title>Login</title>
{{--    <link href="resources/css/registerForm.css" rel="stylesheet" type="text/css">--}}
</head>

<body>
<div class="container">
    <form class="form" method="post">
        @csrf
        <h1>Login</h1>
        <label for="userName">userName</label>
        <input id="userName" type="text" class="form-control" name="user_name" value="">
        <label for="password">password</label>
        <input id="password" type="password" class="form-control" name="password" value="">
        <input class="submit" type="submit" value="submit">
    </form>
</div>
</body>
</html>
