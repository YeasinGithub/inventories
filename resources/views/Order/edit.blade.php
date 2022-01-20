<form action="{{ route('Order.update', $order->id) }}" method="post" class="form">
       {{ csrf_field()}}
  
  <div class="form-control">
    <label for="customer_id">customer_id:</label>
    <input type="number" class="form-control" id="customer_id" name="customer_id" value="{{$order->customer_id}}">
  </div>
  <div class="form-group">
    <label for="order_date">order_date</label>
    <input type="date" name="order_date" id="order_date" class="form-control" value="{{$order->order_date}}">
  </div>
  <div class="form-control">
    <label for="order_status">order_status:</label>
    <input type="text" class="form-control" id="order_status" name="order_status" value="{{$order->order_status}}">
  </div>
  <div class="form-control">
    <label for="total_products">total_products:</label>
    <input type="text" class="form-control" id="total_products" name="total_products" value="{{$order->total_products}}">
  </div>
  <div class="form-control">
    <label for="sub_total">sub_total:</label>
    <input type="text" class="form-control" id="sub_total" name="sub_total" value="{{$order->sub_total}}">
  </div>
  <div class="form-control">
    <label for="vat">vat:</label>
    <input type="text" class="form-control" id="vat" name="vat" value="{{$order->vat}}">
  </div>
  <div class="form-control">
    <label for="total">total:</label>
    <input type="text" class="form-control" id="total" name="total" value="{{$order->total}}">
  </div>
  <div class="form-control">
    <label for="payment_status">payment_status:</label>
    <input type="text" class="form-control" id="payment_status" name="payment_status" value="{{$order->payment_status}}">
  </div>
  
  <div class="form-control">
    <label for="pay">pay:</label>
    <input type="text" class="form-control" id="pay" name="pay" value="{{$order->pay}}">
  </div>
  <div class="form-control">
    <label for="due">total_amount:</label>
    <input type="text" class="form-control" id="due" name="due" value="{{$order->due}}">
  </div>

  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>