<form action="{{ route('Whouse.update', $warehouse->id) }}" method="post" class="form" >
       {{ csrf_field()}}
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$warehouse->name}}">
  </div>
  <div class="form-control">
    <label for="name">Address:</label>
    <input type="text" class="form-control" id="address" name="address" value="{{$warehouse->address}}">
  </div>
  
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
<!-- {{ Form::close() }} -->
  </form>