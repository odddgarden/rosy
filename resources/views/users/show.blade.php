<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Document</title>
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

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;

            button {
                border: none;
                background-color: #027BB7;
                border-radius: 12px;
                color: inherit;
                width: 100px;
                height: 24px;
                font-weight: 600; 
            }

            button:hover {
                background-color: #EFF2F6;
                color: #027BB7;
                cursor: pointer;
            }
        }

        h1 {
            margin: 20px;
        }

        .uploadFile {
            margin: 20px;
            color: #027BB7;
        }

        .uploadFile:hover {
            color: inherit;
        }

        .signin {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25px;
            width: 100px;
            background-color: #027BB7;
            border-radius: 12px;
            font-weight: 400; 
        }

        .signin:hover {
            background-color: #EFF2F6;
            color: #027BB7;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navigation">
        <div class="signin">
            <a href="/"><- HOME</a>
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    </div>
    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>

    <div class="uploadFile">
        <a href="../files/create">Upload Screenplay</a>
    </div>
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