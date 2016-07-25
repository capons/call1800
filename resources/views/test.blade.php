<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<form action="{{action('Tollfree\RegistertollController@store')}}" method="post">

    <input type="hidden" name="_token" value="{!! csrf_token() !!}">


    <input type="text" name="test">
    <button type="submit"  class="btn btn-success btn-lg">Submit</button>
</form>

</body>
</html>