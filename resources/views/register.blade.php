<!doctype html>
<html lang="en">

<head>

    <title>Register Buku Besar</title>

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

<body class="text">
    <main class="form-signin w-100 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="/registeruser" method="post">
                    @csrf
                    <img class="mb-4 align-items-center" src="img/LOGOp-.png" alt="" width="200">
                    <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-left" name="nidn" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">NIDN</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
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
                    <div class="mb-3">
                        <label for="floatingInput">Level</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option selected>-- Pilih --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    <p class="mb-1"> Sudah Punya Akun?
                        <a href="/login" class="text-center">Sign in</a>
                    </p>
                    <p class="mt-5 mb-3 text-muted">&copy; Samalogi 2022</p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
