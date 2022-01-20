
<!-- {{ Form::open(['url' => 'productStock/store', 'method' => 'POST']) }} -->
<form action="{{ route('StockTransfer.store') }}" method="post" class="form">
       {{ csrf_field()}}
  <div class="form-group">
      <label for="product_id">product Id</label>
      <select class="form-control" id="product_id" name="product_id">
      <option>Select Product</option>
      @foreach($products as $product)
      <option value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="product_stock_id">product_stock Id</label>
      <select class="form-control" id="product_stock_id" name="product_stock_id">
      <option>Select Product</option>
      @foreach($productstocks as $productstock)
      <option value="{{$productstock->id}}">{{$productstock->id}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-control">
    <label for="sender_house">sender_house:</label>
    <input type="text" class="form-control" id="sender_house" name="sender_house">
  </div>
  <div class="form-group">
    <label for="receiver_house">receiver_house</label>
    <input type="text" name="receiver_house" id="receiver_house" class="form-control">
  </div>
  <div class="form-control">
    <label for="quantity">quantity:</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>

  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>
<!-- {{ Form::close() }} -->