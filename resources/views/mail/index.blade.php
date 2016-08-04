<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>



<?php
if(isset($link)){
?>
@if(count($link) > 0)
    <div style="position: relative;height: 100px;width: 100%;display: block;text-align: center;margin-top: 50px;">
        <a style="height: 50px;background-color: #00a5bb;padding: 20px;text-decoration: none" href="{{$link}}">Click to activate your account</a>
    </div>
@endif
<?php
}
?>
</body>
</html>