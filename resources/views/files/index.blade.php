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

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .left {
            display: flex;
            align-items: center;

            .logo {
            display: flex;
            font-size: 2.5rem; 
            font-weight: 600; 
            color: #027BB7;

                .blink {
                    color: #EFF2F6;
                }
            }

            input {
                height: 28px;
                border-radius: 8px;
                border: none;
                margin-bottom: 4px;
            }

            
        }

        ::placeholder {
            font-family: 'Courier Prime';
            color: #060A0E;
            padding-left: 4px;
        }

        nav {
            display: flex;
            gap: 20px;

            a:hover {
                color: #027BB7;
            }
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(5, 20%);
        }


        .contents {
            color: #060A0E;
            display: flex;
            background-color: white;
            height: 240px;
            width: 200px;
            border-radius: 4px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .contents:hover {
            background-color: #027BB7;
            color: #EFF2F6;
        }
        
        .dynamic-font-size {
            font-size: 1.5rem;
            text-align: center;
        }

        ::-webkit-scrollbar {
            display:none;
        }

    </style>
</head>
<body>
    <header>
        <div class="left">
            <div class="logo">
                ROSY <div class="blink">|</div>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="Search here...">
            </form>
        </div>
        
        <nav>
            <a href="">Contests</a>
            <a href="">Featured</a>
            <a href="{{ route('users.show', $user->id) }}">Profile</a>
        </nav>
    </header>
    <main>
        <div class="grid">
            @foreach ($files as $file)
            <a href="{{ route('files.show', $file->id) }}">
                <div class="contents">
                    <h1 class="dynamic-font-size">{{$file->title}}</h1>
                    <p>Written By</p>
                    <p>{{ $file->user->first_name }} {{ $file->user->last_name }}</p>
                </div>  
            </a>
            @endforeach
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var headings = document.querySelectorAll('.dynamic-font-size');
            headings.forEach(function(heading) {
                if (heading.textContent.length > 15) {
                    heading.style.fontSize = '1rem'; 
                }
            });
        });
    </script>
</body>
</html>