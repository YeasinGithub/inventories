<form action="{{ route('OrderDetails.store') }}" method="post" class="form">
       {{ csrf_field()}}
  
  <div class="form-group">
      <label for="order_id">order_id</label>
      <select class="form-control" id="order_id" name="order_id">
      <option>select order</option>
      @foreach($orders as $order)
      <option value="{{$order->id}}">{{$order->order_status}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="product_id">product Id</label>
      <select class="form-control" id="product_id" name="product_id">
      <option>Select Product</option>
      @foreach($products as $product)
      <option value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-control">
    <label for="quantity">quantity:</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>
  <div class="form-control">
    <label for="unitcost">unitcost:</label>
    <input type="text" class="form-control" id="unitcost" name="unitcost">
  </div>
  <div class="form-control">
    <label for="total">total:</label>
    <input type="text" class="form-control" id="total" name="total">
  </div>
  

  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>