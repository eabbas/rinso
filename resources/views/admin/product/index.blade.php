<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

        <table border=1>
        <thead>
            <tr>
                <th style="background-color:salmon;">ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>price</th>
                <th>discount</th>
                <th>Show_home</th>
                <th>category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <td>
                    @if($product->show_in_home)
                    {{ " در صفحه اول هم وجود دارد" }}
                    @else
                        {{" مربوط به صفحه اول نمیباشد "}}
                    
                    @endif
                </td>
                <td>
                    @foreach($categories as $category)
                        @if($category->id == $product->cat_id)
                            {{ $category->title }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{url('product/show' , [$product] )}}">show</a>
                    <a href="{{url('product/edit' , [$product] )}}">edit</a>
                    <a href="{{url('product/delete', [$product] )}}">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>