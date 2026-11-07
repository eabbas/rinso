<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('category/update')}}" method="post">
        @csrf
        <div>
            <input type="hidden"  name="id" value="{{$category->id}}">
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"  value="{{$category->title}}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description"  value="{{$category->description}}" required>
        </div>
        <div>
            <label for="show_in_home">Showhome:</label>
            <input type="checkbox" name="homes" value="1" @if($category->show_in_home) {{ "checked" }}  @endif>
        </div>
       
        <button type="submit">submit</button>
    </form>
</body>
</html>