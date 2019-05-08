<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('/global/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('/global/js/jquery.js') }}"></script>
</head>
<body style="background-image: url('{{ url('/global/images/background_main.jpg') }}');">

<div class="main-form">

    <h2>CRUD OPERATIONS</h2>

    <form method="POST" action="{{ url('user_login') }}" onsubmit="return validate_loginform();">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="imgcontainer">
            <img src="{{ url('/global/images/user.png') }}" alt="Avatar" class="avatar">
        </div>

        <div class="container form-content">

            <div class="main-block">
                <label for="uemail"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="uemail" id="uemail" required>
                <span class="help-block" id="emailError" style="display:none;"></span>
            </div>

            <div class="main-block">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="password" required>
                <span class="help-block" id="passwordError" style="display:none;"></span>
            </div>

            <button type="submit">Login</button>
        
            <a class="psw " href="{{ url('/register') }}">Register</a>

            @if($errors->has('wrong'))
                <span class="help-block">{{ $errors->first('wrong') }}</span>
            @endif
        </div>
    </form>
</div>

<script type="text/javascript">

    function validate_loginform() {

        var email = document.getElementById('uemail').value;
        var password = document.getElementById('password').value;
        var email_validate = false, password_validate = false;

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
        {
            $("#emailError").text('');
            $("#emailError").hide();
            email_validate = true;
        } else {
            $("#emailError").text('Invalid Email format');
            $("#emailError").show();
            email_validate = false;
        }

        if(password.length >= 6) {
            $("#passwordError").text('');
            $("#passwordError").hide();
            password_validate = true;
        } else {
            $("#passwordError").text('Minimum 6 digit required.');
            $("#passwordError").show();
            password_validate = false;
        }

        if(email_validate && password_validate) {
            return true;
        } else { return false; }

    }
    
</script>

</body>
</html>
