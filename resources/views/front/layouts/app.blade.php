<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momnon</title>
    <!-- favicon -->
    @include('front/layouts/head')
</head>
<body>
<!-- ((((((((((()))))))))))
    (((((((((((header)))))))))))
    ((((((((((()))))))))))
-->
<header>
    @include('front/layouts/header')

</header>

@yield('content')

@include('front/layouts/footer')

</body>
<script>
    AOS.init();
</script>
<script>

</script>
@yield('js')

<script>
    $("header").load("header.html")
    $("footer").load("footer.html")
</script>
</html>
