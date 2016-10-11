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
        <div class="row" id="register-page">
            <div class="col s12 m4 l3"></div>
            <div class="col s12 m4 l6 z-depth-6 card-panel">
                <form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
                {{csrf_field()}}

                    <div class="row">
                      <div class="input-field col s12 center">
                        <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
                        <p class="center login-form-text">W3lessons - Material Design Login Form</p>
                      </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s6 center">
                            <i class="medium material-icons prefix">perm_identity</i>
                            <input class="validate" id="firstname" type="text" name="firstname" value="{{old('firstname')}}">
                            <label for="firstname" data-error="{{$errors->first('firstname')}}" data-success="Correct" class="left-align">First Name</label>

                        </div>
                    
                        <div class="input-field col s6 center">
                            
                            <input class="validate" id="lastname" type="text" name="lastname" value="{{old('lastname')}}">
                            <label for="lastname" data-error="{{$errors->first('lastname')}}" data-success="Correct" class="left-align">Last Name</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12 center">
                            <i class="medium material-icons prefix">perm_identity</i>
                            <input class="validate" id="username" type="text" name="username" value="{{old('username')}}">
                            <label for="username" data-error="{{$errors->first('username')}}" data-success="Correct" class="left-align">Username</label>
                        </div>
                    </div>
                    
                    <div class="row margin">
                        <div class="input-field col s12 center">
                            <i class="medium material-icons prefix">email</i>
                            <input class="validate" id="email" type="email" name="email" value="{{old('email')}}">
                            <label for="email" data-error="{{$errors->first('email')}}" data-success="Correct" class="left-align">Email</label>
                            
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12 center">
                            <i class="medium material-icons prefix">lock</i>
                            <input class="validate" id="password" type="password" name="password" minlength="6">
                            <label for="password" data-error="{{$errors->first('password')}}" data-success="Correct" class="left-align">Password</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12 center">
                            <i class="medium material-icons prefix">lock</i>
                            <input class="validate" id="password_confirmation" type="password" name="password_confirmation" minlength="6">
                            <label for="password_confirmation" data-error="{{$errors->first('password_conformation')}}" data-success="Correct" class="left-align">Confirm Password</label>
                        </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">Register</button>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="login">Login Now!</a></p>
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

        <script>
            @if($errors->first('email'))
                $('#email').addClass('invalid');
                console.log("error in email");
            @endif
            @if($errors->first('password'))
                $('#password').addClass('invalid');
                console.log('error in password');
            @endif
        </script>
    </body>
  </html>