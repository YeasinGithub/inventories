
{{ Form::open(['url' => 'employee/store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-control">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-control">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="form-group">
      <label for="address">address:</label>
      <textarea class="form-control" id="address" name="address"></textarea>
    </div>
  <div class="form-control">
    <label for="experience">experience:</label>
    <input type="text" class="form-control" id="experience" name="experience">
  </div>
  <div class="form-control">
    <label for="salary">salary:</label>
    <input type="text" class="form-control" id="salary" name="salary">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control">
  </div>
  
    <div class="form-control">
    <label for="vacation">vacation:</label>
    <input type="text" class="form-group" name="vacation" id="vacation">
  </div>
  <div class="form-control">
    <label for="city">city</label>
    <input type="text" class="form-group" name="city" id="city">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
{{ Form::close() }}