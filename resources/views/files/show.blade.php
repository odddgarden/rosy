<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosy</title>
    <style>
    body {
        background-color: #060A0E;
        color: #EFF2F6;
        font-family: 'Courier Prime', monospace;
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

    .pdf {
        display: flex;
        justify-content: center;
    }

    .embed {
    width: 80%;
    height: 100vh;
    overflow: auto;
    border: none;
    border-radius: 12px;
    
    }

    .pdf::-webkit-scrollbar {
        display: none;
    }
    </style>
</head>
<body>
    <div class="contents">
        <h1 class="dynamic-font-size">{{$file->title}}</h1>
        <p>Written By</p>
        <p>{{ $file->user->first_name }}</p>
    </div>  
    <div class="pdf">
        <embed src="{{ asset('pdfs/' . $file->filename) }}" type="application/pdf" class="embed"/>
    </div>
    <script>
        document.addEventListener('keyup', (e) => {
            navigator.clipboard.writeText('');
            alert('SC Disabled')
        })
    </script>
</body>
</html>
