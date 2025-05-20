
{{-- ---------------------------------------------------------------------------------------------------------------------------------------------------- --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" href="css/styleLoginPage.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
<!-- login form -->
      <div class="form-box login">
         @if (session('errorFrom') === 'login')
            @if ($errors->any())
            <script>
                let messages = `on the Login!\n{!! implode('\n', $errors->all()) !!}`;
                alert(messages);
            </script>
            @endif

            @if (session('loginError'))
            <script>
                alert("{{ session('loginError') }}");
            </script>
            @endif
        @endif
        <form action="/login" method="POST">
            @csrf
            <h1>login</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">login</button>
        </form>
      </div>
<!--Registration-->
      <div class="form-box register">
          @if (session('errorFrom') === 'register' && $errors->any())
      <script>
          let messages = `on the Register!\n{!! implode('\n', $errors->all()) !!}`;
          alert(messages);
      </script>
      @endif
        <form action="/register" method="POST">
            @csrf
            <h1>Registration</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}"> 
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}"> 
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required> 
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
      </div>

      
    <!--toggle-->
    <div class="toggle-box">
       <div class="toggle-panel toggle-left">
        <h1>Welcome Back!</h1>
        <p>Don't have an account?</p>
        <button class="btn register-btn">Register</button>
       </div>
       <div class="toggle-panel toggle-right">
        <h1>Hello! Welcome</h1>
        <p>Already have an account?</p>
        <button class="btn login-btn">Login</button>
       </div>
    </div>

    </div>


    <script src="script.js"></script>
    @if (session('masuk'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @if (session('success'))
        @if ($errors->any())
        <script>
        let messages = `on the Login!\n{!! implode('\n', $errors->all()) !!}`;
        alert(messages);
        </script>
        @endif
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif


        <script>
        const container = document.querySelector('.container');
        const regiserBtn = document.querySelector('.register-btn');
        const loginBtn = document.querySelector('.login-btn');

        regiserBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });



        </script>
    </body>
</html>
