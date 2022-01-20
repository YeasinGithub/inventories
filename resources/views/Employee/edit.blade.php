<form action="{{ route('employee.update', $employee->id) }}" method="post" class="form" >
       {{ csrf_field()}}
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
  </div>
  <div class="form-control">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
  </div>
  <div class="form-control">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
  </div>
  <div class="form-control">
    <label for="address">address:</label>
    <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}">
  </div>
  <div class="form-control">
    <label for="experience">experience:</label>
    <input type="text" class="form-control" id="experience" name="experience" value="{{$employee->experience}}">
  </div>
  <div class="form-control">
    <label for="salary">salary:</label>
    <input type="text" class="form-control" id="salary" name="salary" value="{{$employee->salary}}">
  </div>
  <div class="form-group">
      <label for="image">Picture:</label>
      <input type="file" class="form-group" id="image" name="image">
    <img src={{asset($employee->image)}} width="100">
    </div>
  
    <div class="form-control">
    <label for="vacation">vacation:</label>
    <input type="text" class="form-group" name="vacation" value="{{$employee->vacation}}">
  </div>
  <div class="form-control">
    <label for="city">city</label>
    <input type="text" class="form-group" name="city" value="{{$employee->city}}">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
<!-- {{ Form::close() }} -->
  </form>