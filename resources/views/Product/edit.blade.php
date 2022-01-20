<form action="{{ route('product.update', $product->id) }}" method="post" class="form" >
       {{ csrf_field()}}
  <div class="form-group">
      <label for="category_id">Category Id</label>
      <select class="form-control" id="category_id" name="category_id">
      <option>Select Category</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}" @if($category->id==$product->category_id) selected @endif>{{$category->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
      <label for="sub_category_id">Sub Category Id</label>
      <select class="form-control" id="sub_category_id" name="sub_category_id">
      <option>Select Sub Category</option>
      @foreach($Subcategories as $Subcategory)
      <option value="{{$Subcategory->id}}" @if($Subcategory->id==$product->sub_category_id) selected @endif>{{$Subcategory->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
      <label for="sub_sub_category_id">Sub Sub Category Id</label>
      <select class="form-control" id="sub_sub_category_id" name="sub_sub_category_id">
      <option>Select Sub Category</option>
      @foreach($SubSubcategories as $SubSubcategory)
      <option value="{{$SubSubcategory->id}}" @if($SubSubcategory->id==$product->sub_category_id) selected @endif>{{$SubSubcategory->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
      <label for="unit_id">Unit Id</label>
      <select class="form-control" id="unit_id" name="unit_id">
      <option>Select Unit Id</option>
      @foreach($UnitMeasures as $UnitMeasure)
      <option value="{{$UnitMeasure->id}}" @if($UnitMeasure->id==$product->unit_id) selected @endif>{{$UnitMeasure->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-control">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
  </div>
  <div class="form-group">
      <label for="image">Picture:</label>
      <input type="file" class="form-group" id="image" name="image">
    <img src={{asset($product->image)}} width="100">
    </div>
  <div class="form-control">
    <label for="quantity">quantity:</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
  </div>
  <div class="form-group">
      <label for="description">Product Description:</label>
      <textarea class="form-control" id="description" name="description"> {{ $product->description }}</textarea>
    </div>
  
  <button type="submit" class="btn btn-success" value="submit">Submit</button>
  </form>




