
<!-- {{ Form::open(['url' => 'productStock/store', 'method' => 'POST']) }} -->
<form action="{{ route('productStock.store') }}" method="post" class="form">
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
  <div class="form-control">
    <label for="buy_date">buy_date:</label>
    <input type="date" class="form-control" id="buy_date" name="buy_date">
  </div>
  <div class="form-group">
    <label for="expire_date">expire_date</label>
    <input type="date" name="expire_date" id="expire_date" class="form-control">
  </div>
  <div class="form-control">
    <label for="price">price:</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <div class="form-control">
    <label for="unit_price">unit_price:</label>
    <input type="number" class="form-control" id="unit_price" name="unit_price">
  </div>
  <div class="form-control">
    <label for="comission_amount">comission_amount:</label>
    <input type="number" class="form-control" id="comission_amount" name="comission_amount">
  </div>
  <div class="form-control">
    <label for="stock_in_date">stock_in_date:</label>
    <input type="date" class="form-control" id="stock_in_date" name="stock_in_date">
  </div>
  <div class="form-control">
    <label for="sku">sku:</label>
    <input type="text" class="form-control" id="sku" name="sku">
  </div>
  <div class="form-control">
    <label for="quantity">quantity:</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>
  <div class="form-group">
      <label for="warehouse_id">warehouse  Id</label>
      <select class="form-control" id="warehouse_id" name="warehouse_id">
      <option>Select WareHouse</option>
      @foreach($warehouses as $warehouse)
      <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-control">
    <label for="from_sender_warehouse">from_sender_warehouse:</label>
    <input type="text" class="form-control" id="from_sender_warehouse" name="from_sender_warehouse">
  </div>
  <div class="form-control">
    <label for="total_amount">total_amount:</label>
    <input type="number" class="form-control" id="total_amount" name="total_amount">
  </div>
  <div class="form-control">
    <label for="actual_buy_price">actual_buy_price:</label>
    <input type="number" class="form-control" id="actual_buy_price" name="actual_buy_price">
  </div>
  <div class="form-control">
    <label for="buy_price">buy_price:</label>
    <input type="number" class="form-control" id="buy_price" name="buy_price">
  </div>
  <div class="form-control">
    <label for="sell_price">sell_price:</label>
    <input type="number" class="form-control" id="sell_price" name="sell_price">
  </div>
  <div class="form-control">
    <label for="irregular_price">irregular_price:</label>
    <input type="number" class="form-control" id="irregular_price" name="irregular_price">
  </div>

  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>
<!-- {{ Form::close() }} -->