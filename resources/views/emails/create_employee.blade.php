<!DOCTYPE html>
<html>
<head>
    <title>Capital Sage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container">
    <h1>Login Details</h1>
    <ul class="list-group">

        <li class="list-group-item" style="text-decoration: underline"><h3>{{$heading}}</h3></li>
        <li class="list-group-item">{{$msgBody}}</li>
    </ul>
</div>

<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

</body>
</html>
