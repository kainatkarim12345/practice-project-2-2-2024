@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('ADD PRODUCT FORM') }}
                </div>
                <div class="card-body card-header">
                <button id="add_category" class="btn btn-warning"><b><i class="fas fa-plus fa-1x"></i></b> Category</button><br><br>
                <div id="ajax_response"></div>
              <form action="{{url('/store')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                  
                      <div class="col-md-4 mb-3">
                      <label for="name">Category<span style="color:red">*</span></label><br>
                        @if ($errors->has('category'))
                          <div class="text-danger">
                            {{ $errors->get('category')[0] }}
                          </div>
                        @endif
                        <div id="category-container">
                            @if(sizeOf($categories)>0)
                              <select class="form-control" id="category" name="category">
                                <option value=''>Select Category</option>
                                  @foreach($categories as $key)
                                      <option value="{{$key->id}}">{{$key->category}}</option>
                                  @endforeach
                              </select>
                            @endif
                            </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4 mb-3">
                      <label for="name">Name<span style="color:red">*</span></label><br>
                        @if ($errors->has('name'))
                          <span class="text-danger">
                            {{ $errors->get('name')[0] }}
                          </span>
                        @endif
                          <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name">
                      </div>
                      <div class="col-md-4 mb-3">
                      <label for="price">Price<span style="color:red">*</span></label><br>
                        @if ($errors->has('price'))
                          <div class="text-danger">
                            {{ $errors->get('price')[0] }}
                          </div>
                        @endif
                          
                          <input type="number" class="form-control" id="price" value="{{ old('price') }}" name="price">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="stock">Stock<span style="color:red">*</span></label><br>
                          @if ($errors->has('stock'))
                          <div class="text-danger">
                            {{ $errors->get('stock')[0] }}
                          </div>
                        @endif
                          <input type="number" class="form-control" id="stock" value="{{ old('stock') }}" name="stock">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-12">
                        <label for="description">Product Description<span style="color:red">*</span></label>
                          <br>
                        @if ($errors->has('description'))
                          <div class="text-danger">
                            {{ $errors->get('description')[0] }}
                          </div>
                        @endif
                        <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                        <label for="image">Product Image<span style="color:red">*</span></label>
                          <br>
                        @if ($errors->has('image'))
                          <div class="text-danger">
                            {{ $errors->get('image')[0] }}
                          </div>
                        @endif
                          <input type="file" class="form-control" id="image" name="image">
                      </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-4">
                        <label for="discount">Discount (%)</label>
                          <br>
                          <input type="number" class="form-control" id="discount" name="discount">
                      </div>
                    </div>
                    <div class="col-sm-3">
                    <label class="custom-control-label" for="terms">Status</label>
                    
                      <div class="custom-control form-control custom-checkbox mb-3">
                        <input type="radio" class="custom-control-input" id="terms" value="active" checked name="status">&nbsp;Active
                        <input type="radio" class="custom-control-input" id="terms" value="inactive" name="status">&nbsp;Deactive
                      
                      </div>
                    </div>
                  </div>
                  
                  <button class="btn btn-primary btn-block" type="submit">Add Product</button>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
