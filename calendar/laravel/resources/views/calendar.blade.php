<!DOCTYPE html>
<html>
<head>
<title>Habit Calendar</title>
<meta charset='utf-8' />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
<link href="{{asset('css/calendar/fullcalendar.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/calendar/fullcalendar.print.min.css')}}" rel="stylesheet" media='print'  />
<script src="{{asset('js/calendar/moment.min.js')}}"  ></script>
<script src="{{asset('js/calendar/jquery.min.js')}}"  ></script>
<script src="{{asset('js/calendar/fullcalendar.min.js')}}"  ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    
    navLinks: true, // can click day/week names to navigate views
    editable: false,
    eventLimit: false, // allow "more" link when too many events
    events: [
     
   @foreach($completes as $complete)
   {
     title : '☆ {{ $complete->complete_habit }}',
     start: '{{ $complete->created_at }}',
     allDay: true

   },
   @endforeach
     
      
     
    ]
  });

});

</script>
<style>

header {
  margin: 0px 0px;
  padding: 0;
}

body {
  margin: 0px 0px;
  padding: 0;
  
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}

h2 {
  color:#777;
  font-family:helvetica;
  font-size:24px;
}

.fc button {
  color:#777;
  font-size:24;
 
}

.fc day {
 color:#337ab7;
}




</style>
</head>
<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Habits</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
    @guest   
    <h3></h3>
    @else
    <li><a>{{ Auth::user()->user_name }}</a></li>
      <li>
<a href="{{ route('habits') }}"> My Habits </a></li>
    <li><a href="{{ route('logout') }}">Logout</a><li>
      @endguest
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<header>
<body>

<div id='calendar'></div>

</body>
</html>