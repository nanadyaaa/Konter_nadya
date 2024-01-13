<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #DC8686;
    }

    .container {
        width: 100%;
        display: flex;
        max-width: 400px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
    }

    .login {
        width: 400px;
    }

    form {
        width: 300px;
        margin: 60px auto;
    }

    h1 {
        margin: 20px;
        text-align: center;
        font-weight: bolder;
        text-transform: uppercase;
    }

    hr {
        border-top: 2px solid #ffa12c;
    }

    p {
        text-align: center;
        margin: 10px;
    }


    form label {
        display: block;
        font-size: 16px;
        font-weight: 600;
        padding: 5px;
    }

    input {
        width: 100%;
        margin: 2px;
        border: none;
        outline: none;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid gray;
    }

    button {
        border: none;
        outline: none;
        padding: 10px;
        width: 300px;
        color: #000;
        font-size: 16px;
        cursor: pointer;
        margin-top: 30px;
        border-radius: 10px;
        background: #F0DBAF;
    }

    button:hover {
        background: rgba(214, 86, 64, 1);
    }


    @media (max-width: 880px) {
        .container {
            width: 100%;
            max-width: 750px;
            margin-left: 20px;
            margin-right: 20px;
        }

        form {
            width: 300px;
            margin: 20px auto;
        }

        .login {
            width: 450px;
            padding: 30px;
        }

        button {
            width: 100%;
        }

    }

    </style>
</head>
<body>

<body>
    <div class="container">
    <div id="message">
        </div>
        <div class="login">
            <form id= "sample_form">
                <h1>Login</h1>
                <hr>
                <p>Welcome Konter Nanadd^^</p>
                <label for="">Email</label>
                <input type="text" placeholder="..." id="email">
                <label for="">Password</label>
                <input type="password" placeholder="..." id="password">
                <button>Login</button>
                <p>
                    <a href="#">Forgot Password?</a>
                </p>
                <p>
                    Don't have any account?  <a href="http://localhost:81/Nadyaaptr/kantor_nnd/views/Register/">Register Here</a>
                </p>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#sample_form').on('submit', function(event){
                event.preventDefault();
                
                var formData = {
                'email' : $('#email').val(),
                'password' : $('#password').val()
                }
                $.ajax({
                    url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/auth/login.php",
                    method:"POST",
                    data: JSON.stringify(formData),
                    success:function(data){
                        $('#action_button').attr('disabled', false);
                        window.location.href = 'http://localhost:81/Nadyaaptr/kantor_nnd/views/dasboard/';

                    },
                    error: function(err) {
                        console.log(err);   
                        $('#message').html('<div class="alert alert-danger">'+err.responseJSON+'</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>