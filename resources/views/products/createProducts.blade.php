<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link href="{{ URL::asset('loginForm.css') }}" rel="stylesheet">
    <title>Register Product</title>
    {{--    <link href="resources/css/registerForm.css" rel="stylesheet" type="text/css">--}}
</head>

<body>
<div class="container">
    <form class="form" method="post">
        @csrf
        <h1>Register Product</h1>
        <label for="productName">productName</label>
        <input id="productName" type="text" class="form-control" name="productName" value="">
        <label for="descriptionProduct">descriptionProduct</label>
        <textarea id="descriptionProduct" class="textarea" name="descriptionProduct" rows="4" cols="28" placeholder="descriptionProduct"></textarea>
        <label for="sku">sku</label>
        <input id="sku" type="text" class="form-control" name="sku" value="" placeholder="sku">
        <label for="price">price</label>
        <input id="price" type="number" class="form-control" name="price" value="">
        <input class="submit" type="submit" value="submit">
    </form>
</div>
</body>
</html>
