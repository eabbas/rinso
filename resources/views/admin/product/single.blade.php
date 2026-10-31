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
                <th>finalCost</th>
                <th>Show_home</th>
                <th>category</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <?php
                $discountPrice = $product->price*$product->discount/100;
                $finalCost = $product->price - $discountPrice;
                ?>
                <td>{{ $finalCost }}</td>
                @foreach($product->medias as $media)
                    <img class="w-full rounded-large overflow-hidden inline-block"
                    src="<?= asset("storage/" . $media->path) ?>"
                    alt="product image">
                @endforeach
                <td>
                    @if($product->show_in_home)
                    {{ "  ✔  " }}
                    @else
                        {{" ❌ "}}
                    
                    @endif
                </td>
                <td>
                    @foreach($categories as $category)
                        @if($category->id == $product->cat_id)
                            {{ $category->title }}
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>