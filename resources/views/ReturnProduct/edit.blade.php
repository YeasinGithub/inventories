<form action="{{ route('ReturnProduct.update',$returnproduct->id) }}" method="post" class="form">
       {{ csrf_field()}}
  
  <div class="form-group">
      <label for="order_id">order_id</label>
      <select class="form-control" id="order_id" name="order_id">
      <option>select order</option>
      @foreach($orders as $order)
      <option value="{{$order->id}}" @if($order->id==$returnproduct->order_id) selected @endif>{{$order->order_status}}</option>
      @endforeach
    </select>
  </div>
  
  <div class="form-control">
    <label for="return_date">return_date:</label>
    <input type="date" class="form-control" id="return_date" name="return_date" value="{{$returnproduct->return_date}}">
  </div>
  <div class="form-control">
    <label for="reason_of_return">reason_of_return:</label>
    <input type="text" class="form-control" id="reason_of_return" name="reason_of_return" value="{{$returnproduct->reason_of_return}}">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>