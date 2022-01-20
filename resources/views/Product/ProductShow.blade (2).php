
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

<div class="container">
  <h2>Database Category Show</h2>
  <table class="table table-hover">
    <thead>
      <tr class="danger">
        <th>Id</th>
        <th>Category Name</th>
        <th>SubCategory Name</th>
        <th>Sub Category Image</th>
        <th>Status</th>
        <th>Discount</th>
        <th>Has Sub</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
@foreach($SubCategories as $SubCategory)
      <tr>
        <td>{{$SubCategory->id}}</td>
         <td>{{$SubCategory->category->name}}</td>

        <td>{{$SubCategory->name}}</td>
         <td>
      <img src="{{asset('../storage/app/public/Subcategories/'.$SubCategory->image)}}" width="200">
        </td>
        <td>{{$SubCategory->status}}</td>
        <td>{{$SubCategory->discount}}</td>
        <td>{{$SubCategory->has_sub_category}}</td>
		<td>
		<a href="#">Edit </a>
			|
		<a href="#">Delete</a>
		</td>
      </tr>
	  
@endforeach
    </tbody>
  </table>
</div>
</body>
</html>