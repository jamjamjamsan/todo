<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel= "stylesheet" href="css/style.css">
  <link rel= "stylesheet" href="css/reset.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="todo">
    <p class="title">Todo List</p>
    <form action="/todo/create" method="POST" class="create_form">
      @csrf
      <input type="text" name="content" class="create_input">
      <input type="submit" class="create_btn" value="追加">
    </form>
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>{{$item->created_at}}</td>
        <form action="/todo/update/{{$item->id}}" method="POST">
          @csrf
        <td><input type="text"  value="{{$item->content}}" name="content" class="input-update"></td>
        <td><input type="submit" class="update_btn" value="更新"></td>
        </form>
        <td>
      <form action="/todo/delete/{{$item->id}}" method="POST" class="create_form">
      @csrf
      
      <input type="submit"  value="削除" class="delete_btn">
      </form>
      </td>
      </tr>
      @endforeach
    </table>
    </div>
  </div>
</body>
</html>