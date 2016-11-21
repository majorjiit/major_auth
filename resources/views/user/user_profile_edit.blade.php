<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>MyRecommender</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
  <div class="row" id="type_form">
        <div class="col s12 m3"></div>
        <div class="col s12 m6 card-panel" style="background-color: white;">
        {{ csrf_field()}}
        <br>
          <div class="row">
            <div class="col s2">
              <i class="medium material-icons prefix" style="color:#366bc1;">account_circle</i>
            </div>
            <div class="input-field col s5">
              <input id="icon_prefix" type="text" name="firstname" class="validate" value="{{$user[0]->firstname}}">
              <label for="icon_prefix" style="color:green;font-weight: bold;">First Name</label>
            </div>
            <div class="input-field col s5">
              <input id="icon_prefix" type="text" name="lastname" class="validate" value="{{$user[0]->lastname}}">
              <label for="icon_prefix" style="color:green;font-weight: bold;">last Name</label>
            </div>
          </div>

          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s5">
              <input id="icon_prefix" type="email" name="email" class="validate" value="{{$user[0]->email}}">
              <label for="icon_prefix" style="color:green;font-weight: bold;">Email</label>
            </div>
            <div class="col s5" style="padding-top: 20px;text-align: center;">
              <button id="edit_basic" class="btn waves-effect waves-dark blue">Edit</button>
            </div>
          </div>

          <hr>
          
          <div class="row">
            <div class="col s2">
              <i class="medium material-icons prefix" style="color:red;">description</i>
            </div>
            <div class="input-field col s5">
                <select id="branch_select" name="branch_select" required>
                  <option value="" disabled selected>Choose your branch</option>
                  @foreach ($branch as $br)
                    @if($br['name']==$student[0]->branch)
                      <option value="{{$br['name']}}" selected>{{$br['name']}}</option>
                    @else
                      <option value="{{ $br['name'] }}" >{{ $br['name'] }}</option>
                    @endif
                  @endforeach
                </select>
                <label for="branch_select" style="color:green;font-weight: bold;">Branch</label>
            </div>
            <div class="input-field col s5">
                <select id="college_select" name="college_select" required>
                  <option value="" disabled selected>Choose your college</option>
                  @foreach ($college as $cl)
                    @if($cl['name']==$student[0]->college)
                      <option value="{{$cl['name']}}" selected>{{$cl['name']}}</option>
                    @else
                      <option value="{{ $cl['name'] }}" >{{ $cl['name'] }}</option>
                    @endif
                  @endforeach
                </select>
                <label for="college_select" style="color:green;font-weight: bold;">College</label>
            </div>
          </div>
            <div class="row">
              <div class="col s2"></div>

              <div class="input-field col s5">
                  <select id="degree_select" name="degree_select" required multiple>
                    <option value="" disabled selected>Choose your degree</option>
                    @foreach ($degree as $de)
                      @if($de['name']==$student[0]->degree)
                        <option value="{{$de['name']}}" selected>{{$de['name']}}</option>
                      @else
                        <option value="{{ $de['name'] }}" >{{ $de['name'] }}</option>
                      @endif
                    @endforeach
                  </select>
                  <label for="degree_select" style="color:green;font-weight:bold;">Degree</label>
              </div>
              <div class="col s5" style="padding-top: 20px;text-align: center;">
                <button class="btn waves-effect waves-dark blue">Edit</button>
              </div>
              
            </div>

            <hr>
            
            <div class="row">
              <div class="col s2">
                <i class="medium material-icons prefix" style="color:green;">stars</i>
              </div>
              <div class="col s10">
                <h5>Skills</h5>
              </div>
            </div>
            <div class="row">
              <div class="col s2"></div>
              <div class="input-field col s10">
                <div id="skills_chips" class="chips chips-initial"></div>
              </div>

              <div class="col s2"></div>
              <div class="col s5"></div>
              <div class="col s5" style="padding-top: 20px;text-align:center;">
                <button class="btn waves-effect waves-dark blue">Edit</button>
              </div>
            </div>
          </div>
        </div> 
      </div>

  <?php $data="";?>

  @if($student_skills == "")
    <?php $data ="";?>

  @else
    @foreach ($student_skills as $skill)
      <?php $data = $data."{tag:'". $skill   ."',},"; ?>
    @endforeach
  @endif

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../../js/materialize.js"></script>
  <script src="../../../js/init.js"></script>
  <script>
  
    $(document).ready(function() {
      $('select').material_select();  
      
      //$('.chips').material_chip();

      $('.chips-initial').material_chip({
        data: [<?php echo $data;?>],
      });
      $('edit_basic').click(function()
      {
        alert("button clicked");
        
        $.ajax({
          method: "POST",
          url: "some.php",
          data: { name: "John", location: "Boston" } 
          }).done(function( msg ) {
            alert( "Data Saved: " + msg );
        });
      }
      );

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
