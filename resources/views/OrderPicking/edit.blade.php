<form action="{{ route('OrderPicking.update', $orderpicking->id) }}" method="post" class="form">
       {{ csrf_field()}}
  
  <div class="form-group">
      <label for="order_id">order_id</label>
      <select class="form-control" id="order_id" name="order_id">
      <option>select order</option>
      @foreach($orders as $order)
      <option value="{{$order->id}}" @if($order->id==$orderpicking->order_id) selected @endif>{{$order->order_status}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="warehouse_id">warehouse Id</label>
      <select class="form-control" id="warehouse_id" name="warehouse_id">
      <option>Select Product</option>
      @foreach($warehouses as $warehouse)
      <option value="{{$warehouse->id}}" @if($warehouse->id==$orderpicking->warehouse_id) selected @endif>{{$warehouse->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="employee_id">employee_id</label>
      <select class="form-control" id="employee_id" name="employee_id">
      <option>Select Product</option>
      @foreach($employees as $employee)
      <option value="{{$employee->id}}" @if($employee->id==$orderpicking->employee_id) selected @endif>{{$employee->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-control">
    <label for="picking_date">picking_date:</label>
    <input type="date" class="form-control" id="picking_date" name="picking_date" value="{{$orderpicking->picking_date}}">
  </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
</form>