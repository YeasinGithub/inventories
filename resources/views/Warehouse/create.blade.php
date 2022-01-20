{{ Form::open(['url' => 'Whouse/store', 'method' => 'POST']) }}

  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-control">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address">
  </div>
  
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}