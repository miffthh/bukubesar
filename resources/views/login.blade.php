<!doctype html>
<html lang="en">

<head>

    <title>Login Buku Besar</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

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
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('../img/logo.png');
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

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="/loginproses" method="post">
                    @csrf
                    <img class="mt-3mb-4" src="img/LOGOp-.png" alt="" width="200">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Sign in</button>
                    <p class="mb-1"> Belum Punya Akun?
                        <a href="/register" class="text-center">Register</a>
                    </p>
                    <p class="mt-5 mb-3 text-muted">&copy; Samalogi 2022</p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
