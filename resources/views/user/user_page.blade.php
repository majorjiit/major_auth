<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>MyRecommender</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container" style="width:100%;">
      <a id="logo-container" href="#" class="brand-logo" style="">MyRecommender</a>
      <?php
        //echo Auth::check();
        if(Auth::guest())
        {
      ?>
          <ul class="right hide-on-med-and-down">
            <li><a href="register">Register</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
            <li><a href="login">Login</a></li>
          </ul>
          <ul id="nav-mobile" class="side-nav">
            <li><a href="register">Register</a></li>
            <li><a href="login">Login</a></li>
          </ul>
       <?php 
       }
      else{
        ?>
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="{{URL::current()}}/profile">profile</a>
            </li>
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
               </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
           </li>
                                
          </ul>

          <ul id="nav-mobile" class="side-nav">
            
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
               </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
           </li>
                                
          </ul>
     <?php }?>
       
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <br>
  <br>
  @if($user[0]->type == '')
      <div class="row" id="type_form" style="display:none;">
        <div class="col s12 m3"></div>
        <form class="col s12 m6 card-panel" style="background-color: #366bc1;" method="post" action="{{url('student_entry')}}">
        {{ csrf_field()}}
        <input type="text" name="username" value="{{$user[0]->username}}" style="display:none;"/>
          <span class="card-content white-text">
            <h4>Who you are?</h4>
          </span>
          <p class="white-text"> Please select what you are Student Or Employee?</p>
          <div class="input-field col s12 white-text">
                <select name="type_select" required>
                  <option value="" disabled selected>Choose your Type</option>
                  <option value="student" >Student</option>
                  <option value="employee">Employee</option>
                </select>
                <label class="white-text">Select Type</label>
          </div>
          <button class="btn waves-effect waves-dark white blue-grey-text" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
          <br>
          <br>
        </form> 
      </div>
  @endif

  @if(isset($student))
    @if($student[0]->college == '')
      <div class="row" id="type_form" style="display:none;">
        <div class="col s12 m3"></div>
        <form class="col s12 m6 card-panel" style="background-color: #366bc1;" method="post" action="{{url('student_details_entry')}}">

        {{ csrf_field()}}
        
        <input type="text" name="username" value="{{$user[0]->username}}" style="display:none;">
          <span class="card-content white-text">
            <h4>In Which College you are studying?</h4>
          </span>
          <div class="input-field col s12 white-text">
                <select name="college_select" onChange="getBranch (this.selectedIndex);" required>
                  <option value="" disabled selected>Choose your College</option>
                   @foreach ($college as $col)
                  <option value="{{ $col['name'] }}" >{{ $col['name'] }}, {{ $col['location'] }}</option>
                  @endforeach
                </select>
          </div>

          <span class="card-content white-text">
            <h4>Select your degree</h4>
          </span>
          <div class="input-field col s12 white-text">
                <select name="degree_select" required>
                  <option value="" disabled selected>Choose your degree</option>
                  @foreach ($degree as $deg)
                  <option value="{{ $deg['name'] }}" >{{ $deg['name'] }}</option>
                  @endforeach
                  
                </select>
          </div>

          <span class="card-content white-text">
            <h4>Select your branch</h4>
          </span>
          <div class="input-field col s12 white-text">
                <select name="branch_select" required>
                  <option value="" disabled selected>Choose your branch</option>
                  @foreach ($branch as $br)
                    <option value="{{ $br['name'] }}" >{{ $br['name'] }}</option>
                  @endforeach
                </select>
          </div>


          <button class="btn waves-effect waves-dark white blue-grey-text" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
          <br>
          <br>
        </form> 
      </div>
    @endif
  @endif

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
    $(document).ready(function() {
      $('select').material_select();  
      
    });
    
    $( window ).load(function() {
    // Run code
      if($('#type_form'))
      {

        $('#type_form').fadeIn(2000);
      } 
    });
  </script>
  </body>
</html>
