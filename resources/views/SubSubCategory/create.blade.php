
{{ Form::open(['url' => 'SubSubcategory/store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
  <div class="form-group">
      <label for="sub_category_id">Sub Category Id</label>
      <select class="form-control" id="sub_category_id" name="sub_category_id">
      <option>Select Sub Category</option>
      @foreach($sub_categories as $Subcategory)
      <option value="{{$Subcategory->id}}">{{$Subcategory->name}}</option>
      @endforeach
    </select>
  </div>
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control">
  </div>
  <div class="form-control">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name="status">
	  <option>Select Status</option>
	  <option value="1">Published</option>
	  <option value="0">Unpublished</option>
	  </select>
    </div>
    <div class="form-control">
    <label for="discount">Discount:</label>
    <input type="number" class="form-group" name="discount">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}