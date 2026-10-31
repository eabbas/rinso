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
                <th>Show_home</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    @if($category->show_in_home)
                    {{ " در صفحه اول هم وجود دارد" }}
                    @else
                        {{" مربوط به صفحه اول نمیباشد "}}
                    
                    @endif
                </td>
                <td>
                    <a href="{{url('category/show' , [$category] )}}">show</a>
                    <a href="{{url('category/edit' , [$category] )}}">edit</a>
                    <a href="{{url('category/delete', [$category] )}}">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>