<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('product/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title">
        <br><br>
        <label for="description">Description:</label>
        <input type="text" name="description">
        <br><br>
        <label for="price">Price:</label>
        <input type="text" name="price">
        <br><br>
        <label for="discount">Discount:</label>
        <input type="text" name="discount">
        <br><br>
        <label for="image">عکس اصلی محصول :</label>
        <input type="file" name="mainImage">
        <br><br>
        <br><br>
        <label for="show_home">Show_in_home:</label>
        <input type="checkbox" name="home" value="1">
        <br><br>
        <label for="cat_id">Category:</label>
        <select name="categoryId">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <br><br>
        <button>create</button>
    </form>
</body>
</html>