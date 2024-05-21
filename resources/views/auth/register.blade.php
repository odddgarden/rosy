<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Rosy</title>
    <style>
        body {
            background-color: #060A0E;
            color: #EFF2F6;
            font-family: 'Courier Prime', monospace;
        }

        header {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .logo {
            display: flex;
            font-size: 2.5rem; 
            font-weight: 600; 
            color: #027BB7;

            .blink {
                color: #EFF2F6;
            }
        }

        .signin {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30px;
            width: 100px;
            background-color: #027BB7;
            border-radius: 12px;
            font-weight: 400; 
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
            

            .card {
            background-color: #027BB7;
            border-radius: 12px;
            height: 50vh;
            width: 25vw;
            }

            .form {
                position: absolute;
                display: flex;
                flex-direction: column;
                justify-content: center;    
                align-items: center;
                font-size: 1.2rem;

                .fields {
                    display: flex;
                    flex-direction: column;
                    margin: 8px;

                    input {
                    height: 32px;
                    width: 300px;
                    background-color: #EFF2F6;
                    border-radius: 12px;
                    border: none;
                    }
                }


                button {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 30px;
                width: 100px;
                background-color: #EFF2F6;
                border-radius: 12px;
                border: none;
                font-family: inherit;
                font-weight: 600; 
                }
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            ROSY <div class="blink">|</div>
        </div>
        <div class="signin">
            <a href="/"><- HOME</a>
        </div>
    </header>
    <main>
        <div class="card"></div>
        <form class="form" method="POST" action="/register" >
        @csrf
        <div class="fields">
            First Name: <input type="text" name="first_name" id="first_name">
        </div>
        <div class="fields">
            Last Name: <input type="text" name="last_name" id="last_name">
        </div>
        <div class="fields">
            Password: <input type="password" name="password" id="password">
        </div>
        <div class="fields">
            Confirm Password: <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <br>
        <button>Register</button>
    </form>
    </main>
</body>
</html>