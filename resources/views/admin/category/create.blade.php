<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('category/store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title">

        <label for="description">Description:</label>
        <input type="text" name="description">

        <label for="show_home">Show_in_home:</label>
        <input type="checkbox" name="homes[]" value="1">

        <button>create</button>
    </form>
</body>
</html>