<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosy - Upload Screenplay</title>
</head>
<body>
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="title">Synopsis:</label><br>
        <textarea name="synopsis" id="synopsis" rows=6 cols=100></textarea><br>

        <label for="genre">Select genre:</label><br>
        <select name="genre" id="genre">
            <option value="action">Action</option>
            <option value="horror">Horror</option>
            <option value="comedy">Comedy</option>
            <option value="romance">Romance</option>
        </select><br><br>

        <label for="pdf_file">Select PDF file:</label><br>
        <input type="file" id="pdf_file" name="pdf_file"><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>