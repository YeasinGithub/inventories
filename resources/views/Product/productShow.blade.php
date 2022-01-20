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
  <form action="{{route('product/search')}}" method="post">
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

<div class="container">
  <h2>Database Products Show</h2>
  <table class="table table-hover">
    <thead>
      <tr class="danger">
        <th>Id</th>
        <th>Product Name</th>
      </tr>
    </thead>

    <tbody>
@foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
         <td>{{$product->name}}</td>
      </tr>
	  
@endforeach
    </tbody>
  </table>
</div>
</body>
</html>