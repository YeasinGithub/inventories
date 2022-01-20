
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<form action="{{route('category/search')}}" method="post">
  {{ csrf_field()}}
<div class="container">

  <div class="input-group">
      <input type="text" class="form-control" name="search" id="search"> 

      <span class="input-group-btn">
            <button type="submit" class="btn btn-default" value="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
    
  <h2>Database Category Show</h2>
  <table class="table table-hover">
    <thead>
      <tr class="danger">
        <th>Id</th>
        <th>Category Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Discount</th>
        <th>Has Sub</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  
@foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
          <img src="{{url('storage/categories/'. $category->image)}}" width="100">
        </td>
        <td>{{$category->status}}</td>
        <td>{{$category->discount}}</td>
        <td>{{$category->has_sub_category}}</td>
        <td>
          <a href="{{url('/category/edit/'.$category->id)}}">Edit </a>
            |
          <a href="{{url('/category/delete/'.$category->id)}}">Delete</a>
        </td>
    </tr>
    
@endforeach
    </tbody>
  </table>
</div>
</form>
</body>
</html>