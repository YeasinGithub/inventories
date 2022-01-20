
{{ Form::open(['url' => 'unit/store', 'method' => 'POST']) }}

  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}