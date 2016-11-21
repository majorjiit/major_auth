<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <div id="login-page" class="row" style="background-color: #2bbbad;">
    <div class="col s12 m4 l3"></div>
    <div class="col s12 m4 l6 z-depth-6 card-panel" style="margin-top: 40px;">
      <form class="login-form" method="POST" action="{{url('/login')}}">
      {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
            <h4 class="center login-form-text">MyRecommender</h4>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="medium material-icons prefix">perm_identity</i>
            <input class="validate" id="email" type="email" name="email">
            <label for="email" data-error="{{$errors->first('email')}}" data-success="Correct" class="left-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="medium material-icons prefix">vpn_key</i>
            <input class="validate" id="password" type="password" name="password" requiered>
            <label for="password" data-error="{{$errors->first('password')}}">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" name="remember" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="register">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="forgot-password">Forgot password?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    </body>
  </html>