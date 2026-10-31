<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('product/update')}}" method="post">
        @csrf
        <div>
            <input type="hidden"  name="id" value="{{$product->id}}">
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"  value="{{$product->title}}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description"  value="{{$product->description}}" required>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price"  value="{{$product->price}}" required>
        </div>
        <div>
            <label for="discount">Discount:</label>
            <input type="text" id="discount" name="discount"  value="{{$product->discount}}" required>
        </div>
        <div>
            <label for="show_in_home">Showhome:</label>
            <input type="checkbox" name="homes" value="1" @if($product->show_in_home) {{ "checked" }}  @endif>
        </div>
        <div>
            <label for="cat_id">Category:</label>
            <select name="categoryId">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $product->cat_id) {{ 'selected' }} @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">submit</button>
    </form>
</body>
</html>