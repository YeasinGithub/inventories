
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
        <th>sub_category_id Name</th>
        <th>Sub Sub Category Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Discount</th>
      </tr>
    </thead>
    <tbody>
	
@foreach($SubSubCategories as $SubSubCat)
      <tr>
        <td>{{$SubSubCat->id}}</td>
        <td>{{$SubSubCat->Subcategory->name}}</td>
        <td>{{$SubSubCat->name}}</td>
        
        <td><img src="{{asset('../storage/app/public/SubSubcategories/'.$SubSubCat->image)}}" width="200"></td>
        <td>{{$SubSubCat->status}}</td>
        <td>{{$SubSubCat->discount}}</td>
  </tr>
	  
@endforeach
    </tbody>
  </table>
</div>
</body>
</html>