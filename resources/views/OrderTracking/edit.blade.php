<form action="{{ route('OrderTracking.update',$ordertracking->id) }}" method="post" class="form">
       {{ csrf_field()}}
  
  <div class="form-group">
      <label for="order_id">order_id</label>
      <select class="form-control" id="order_id" name="order_id">
      <option>select order</option>
      @foreach($orders as $order)
      <option value="{{$order->id}}" @if($order->id==$ordertracking->order_id) selected @endif>{{$order->order_status}}</option>
      @endforeach
    </select>
  </div>
  
  <div class="form-control">
    <label for="order_accept">order_accept:</label>
    <input type="number" class="form-control" id="order_accept" name="order_accept" value="{{$ordertracking->order_accept}}">
  </div>
  <div class="form-control">
    <label for="picking_date">picking_date:</label>
    <input type="number" class="form-control" id="picking_date" name="picking_date" value="{{$ordertracking->picking_date}}">
  </div>
  <div class="form-control">
    <label for="product_deliverd">product_deliverd:</label>
    <input type="number" class="form-control" id="product_deliverd" name="product_deliverd" value="{{$ordertracking->product_deliverd}}">
  </div>
  <div class="form-control">
    <label for="product_on_hand">product_on_hand:</label>
    <input type="number" class="form-control" id="product_on_hand" name="product_on_hand" value="{{$ordertracking->product_on_hand}}">
  </div>
  <div class="form-control">
    <label for="order_complete">order_complete:</label>
    <input type="number" class="form-control" id="order_complete" name="order_complete" value="{{$ordertracking->order_complete}}">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>