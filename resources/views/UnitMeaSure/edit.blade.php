<form action="{{ route('unit.update', $unitmeasure->id) }}" method="post" class="form" >
       {{ csrf_field()}}
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$unitmeasure->name}}">
  </div>
  
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
<!-- {{ Form::close() }} -->
  </form>