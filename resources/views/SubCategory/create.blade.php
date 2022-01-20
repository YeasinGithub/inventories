
{{ Form::open(['url' => 'Subcategory/store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
  <div class="form-group">
      <label for="category_id">Category Id</label>
      <select class="form-control" id="category_id" name="category_id">
      <option>Select Category</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
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
  <div class="form-control">
    <label for="has_sub_sub_category">Has Sub Category:</label>
    <input type="number" class="form-group" name="has_sub_sub_category">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}