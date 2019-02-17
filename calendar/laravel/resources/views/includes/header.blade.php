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
    <li><a>{{ Carbon\Carbon::now()->format('l jS \\of F') }}</li></a> 
    <li><a href="#"> {{ Auth::user()->user_name }}</a></li>
    <li><a href="{{ route('calendar') }}"> Calendar </a></li>
    <li><a href="{{ route('logout') }}">Logout</a><li>
    @endguest 
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>