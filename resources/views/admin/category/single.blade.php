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
            </tr>
        </thead>
        <tbody>
          
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    @if($category->show_in_home == 1)
                    {{ "  ✔  " }}
                    @else
                        {{" ❌ "}}
                    
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>