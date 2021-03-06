<?php
require 'function.php';
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png">
    <style>
        body {
            background-color: lightgreen;
        }

        .container .row .mx-auto {

            width: 18rem;
            margin-top: 3rem;
        }

        .container .row .card-body img {
            margin-top: -5px;
            width: 70px;
        }

        .container .row .card-body {
            width: 100%;
        }

        .input-group-prepend .input-group-text img {
            width: 5px;
        }

        @media (min-width: 992px) {
            .container .row .mx-auto {
                margin-top: 10rem;
                width: 30rem;
            }

            .container .row .card-body img {
                margin-top: 20px;
                width: 100px;
            }

            .container .row .card {
                width: 400px;
            }
        }
    </style>
    <title>Kontrakan</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm col-sm-offset-4">
                <div class="card mx-auto">
                    <div class="card-header bg-primary text-center">
                        Login
                    </div>
                    <div class="card-body">
                        <img class="rounded mx-auto d-block" src="img/logo.png" alt="Logo">
                        <form action="" method="post">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2 mt-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="img/profile.png" alt="" style="width: 18px;margin-top:-1px;">
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="username">
                            </div>
                            <label class="sr-only" for="inlineFormInputGroup">Password</label>
                            <div class="input-group mb-2 mt-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="img/lock.png" alt="" style="width: 20px;margin-top:-1px;">
                                    </div>
                                </div>
                                <input type="password" name="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                            </div>
                            <?php
                            if (isset($_POST["login"])) {
                                $username = strtolower(stripcslashes($_POST["username"]));
                                $password = mysqli_real_escape_string($conn, $_POST["password"]);
                                if ($username == "preview" && $password == "preview") {
                                    $_SESSION['username'] = $username;
                                    $_SESSION["login"] = true;
                                    // echo "Selamat datang, '$username'";
                                    // login($username);
                                    header('Location: transaction.php');
                                } else if ($username == "admin" && $password == "1234") {
                                    $_SESSION['username'] = $username;
                                    $_SESSION["login"] = true;
                                    $_SESSION['user'] = true;
                                    header('Location: transactionadmin.php');
                                } else {
                                    ?>
                                    <div class="text-center">
                                        Username atau password salah!</div>
                                    <style>
                                        input[type=text] {
                                            border: 1px solid #ff0000;
                                        }

                                        input[type=password] {
                                            border: 1px solid #ff0000;
                                        }
                                    </style>
                            <?php
                                }
                            }
                            ?>
                            <button type="submit" class="btn btn-primary float-right" name="login">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted">
                        Input 'preview'
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>