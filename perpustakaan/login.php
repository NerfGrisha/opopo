<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      html,
        body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        max-width: 330px;
        padding: 15px;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
    </style>
  </head>
  <body class="text-center">
  <main class="form-signin w-100 m-auto">
    <form action="proses-login.php" method="POST">
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
        <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword" name="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023 SMA Berdikari</p>
    </form>
    </main>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
