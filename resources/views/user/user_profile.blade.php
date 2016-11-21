<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>MyRecommender</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
    body{
      background-color:grey;
    }
  </style>
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
              <a href="{{URL::current()}}">profile</a>
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
  <div id="profile_view" class="row">
    <div class="col s12 m3"></div>
    <div class="card-panel white col s12 m6">
      <div class="row">
      <br>
        <div class="col s3">
          <img src="../../images/gaurav.jpg" class="circle responsive-img">
        </div>
        <div class="col s9" style="text-align:center">
          <h4>{{$user[0]->firstname}}&nbsp; {{$user[0]->lastname}}</h4>
          
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="{{URL::current()}}/edit" class="btn waves-effect waves-dark blue">Edit</a>
      </div>
      <hr>

      <div class="row">
        <div class="col s5">
          <p>Email:</p>
        </div>
        <div class="col s7">
          <p>{{$user[0]->email}}</p>
        </div>
      </div>

      <div class="row">
        <div class="col s5">
          <p>College:</p>
        </div>
        <div class="col s7">
          <p>{{$student[0]->college}}</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col s5">
          <p>Branch:</p>
        </div>
        <div class="col s7">
          <p>{{$student[0]->branch}}</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col s5">
          <p>Degree:</p>
        </div>
        <div class="col s7">
          <p>{{$student[0]->degree}}</p>
        </div>
      </div>

      <div class="row">
        <div class="col s5">
          <p>Skills:</p>
        </div>
        <div class="col s7">
          <p></p>
        </div>
      </div>
 
    </div>   
  </div>
 
 
  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../js/materialize.js"></script>
  <script src="../../js/init.js"></script>
  <script>
  
    $(document).ready(function() {
      $('select').material_select();  
      
    });
    /*
    $( window ).load(function() {
    // Run code
      if($('#type_form'))
      {

        $('#type_form').fadeIn(2000);
      } 
    });
    */ 
  </script>
  </body>
</html>
