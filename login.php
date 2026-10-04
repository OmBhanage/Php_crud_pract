<?php
include 'db.php';
 session_start();
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql=$conn->prepare('select name, password from users where email=?');
    $sql->bind_param('s',$email);
    $sql->execute();
    $sql->bind_result($name, $pass);
    $sql->fetch();
        if (password_verify($password,$pass)) {
             $_SESSION['email']=$email;
             $_SESSION['username']=$name;
            header('Location:dashboard.php');
            exit;
        }
}
            ?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h2 class="text-center mt-5">Login with us</h2>
            <form action="" method="post">
                <div class="container col-5">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            maxlength="50"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            required
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
