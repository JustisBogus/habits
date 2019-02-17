<!DOCTYPE html>
<html>
<head>
    <title>Habit Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">

<link href="{{asset('css/calendar/fullcalendar.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/calendar/fullcalendar.print.min.css')}}" rel="stylesheet" media='print'  />
<script src="{{asset('js/calendar/moment.min.js')}}"  ></script>
<script src="{{asset('js/calendar/jquery.min.js')}}"  ></script>
<script src="{{asset('js/calendar/fullcalendar.min.js')}}"  ></script>


</head>



    <body>
        @include('includes.header')
        <div class="container">
        @yield('content')
            </div>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::to('/js/script.js') }}"></script>
    </body>
</html>