<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link href="{{ URL::asset('registerForm.css') }}" rel="stylesheet">
    <title>Registration</title>
</head>

<body>
    <div class="container">
            <form class="form" method="post">
                @csrf
                    <h1>Register</h1>
                    <label for="userName">userName</label>
                    <input id="userName" type="text" class="form-control" name="user_name" value="" placeholder="user name">
                    <label for="password">password</label>
                    <input id="password" type="password" class="form-control" name="password" value="" placeholder="password">
                    <label for="confirmPassword">confirmPassword</label>
                    <input id="confirmPassword" type="password" class="form-control" name="confirm_password" value="" placeholder="confirm password">

                <label for="firstName">firstName</label>
                <input id="firstName" type="text" class="form-control" name="first_name" value="" placeholder="first name">
                <label for="lastName">lastName</label>
                <input id="lastName" type="text" class="form-control" name="last_name" value="" placeholder="last name">
                <label for="userPhoto">userPhoto</label>
                <input type="file" name="user_photo" accept="image/png, image/gif, image/jpeg" />
                <label for="country">country</label>
                <input id="country" type="text" class="form-control" name="country" value="" placeholder="country">
                <label for="city">city</label>
                <input id="city" type="text" class="form-control" name="city" value="" placeholder="city">
                <label for="street">street</label>
                <input id="street" type="text" class="form-control" name="street" value="" placeholder="street">
                <label for="postalCode">postalCode</label>
                <input id="postalCode" type="number" class="form-control" name="postal_code" value="" placeholder="postal code">
                <label for="bio">bio</label>
                <textarea id="bio" class="textarea" name="bio" rows="4" cols="28" placeholder="bio"></textarea>

                <label for="birthDate">birthDate</label>
                <input id="birthDate" type="date" class="form-control" name="birth_date" value="" placeholder="birth date">



                <input class="submit" type="submit" value="submit">
            </form>
    </div>
</body>
</html>
