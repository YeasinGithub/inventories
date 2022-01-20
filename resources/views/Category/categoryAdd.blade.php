
{{ Form::open(['url' => 'category/store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
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
    <label for="has_sub_category">Has Sub Category:</label>
    <input type="number" class="form-group" name="has_sub_category">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}