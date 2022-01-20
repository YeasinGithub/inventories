<form action="{{ route('SubSubcategory.update', $SubSubcategory->id) }}" method="post" class="form" >
       {{ csrf_field()}}
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{$SubSubcategory->name}}">
  </div>
  <div class="form-group">
      <label for="image">Picture:</label>
      <input type="file" class="form-group" id="image" name="image">
    <img src={{asset($SubSubcategory->image)}} width="100">
    </div>
  <div class="form-group">
      <label for="status">Publication Status:</label>
      <select class="form-control" id="status" name="status">
    <option>Select Status</option>
    <option value="1" {{ $SubSubcategory->status == 1? 'selected' : '' }}>Published</option>
    <option value="0" {{ $SubSubcategory->status == 0? 'selected' : '' }}>Unpublished</option>
    </select>
    </div>
  <div class="form-group">
    <label for="discount">Discount:</label>
    <input type="number" class="form-control" name="discount" value="{{$SubSubcategory->discount}}">
  </div>

  <button type="submit" class="btn btn-success" value="submit">Update</button>
<!-- {{ Form::close() }} -->
  </form>