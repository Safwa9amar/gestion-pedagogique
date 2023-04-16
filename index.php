<?php
session_start();

if (isset($_SESSION['user'])) {
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include './templates/components/header.php' ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .login-form h2 {
            text-align: center;
        }

        label.error {
            color: red;
        }

        label.success {
            color: green;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 login-form">
                <form id="loginForm" method="post">
                    <h2>Login</h2>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div id="message"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include './templates/components/scripts.php' ?>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (event) {
            // get submit btn 
            var submitBtn = $(this).find('button[type="submit"]');
            let loader = `
            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
            `
            // prevent the default form submission behavior
            event.preventDefault();
            // get the form data
            var formData = $('#loginForm').serialize();
            submitBtn.html(loader + 'Loading...');
            // send an AJAX request to the server
            $.ajax({
                type: 'POST',
                url: 'api/login.php',
                data: formData,
                success: function (response) {
                    // handle the successful response
                    submitBtn.html('Login');
                    $('#message')
                        .html(`
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                ${JSON.parse(response).message}
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        `)
                    setTimeout(() => {
                        window.location.href = 'home.php'
                    }, 2000);
                },
                error: function (response) {
                    $('#message')
                        .html(`
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                ${JSON.parse(response.responseText).message}
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        `)
                }
            });
        });
    });

</script>

</html>