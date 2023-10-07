<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        
                        <div class="panel-collapse">
                            <div class="panel-body">
                                <h2 style="background:orange; color:#fff; padding:20px;">Add New Product</h2>
                                <form wire:submit.prevent="addProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name Of The Product</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name..." wire:model="name" wire:keyup="generateslug">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="slug..." wire:model="slug"  >
                                        @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">regular_price </label>
                                        <input type="text" id="regular_price" name="regular_price" class="form-control" placeholder="Price..." wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Sale Price </label>
                                        <input type="text" id="sale_price" name="sale_price" class="form-control" placeholder="Sale Price..." wire:model="sale_price">
                                        @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">ShortDescription</label>
                                        <textarea  id="short_description" name="short_description" class="form-control" placeholder="ShortDescription..." wire:model="short_description"></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea  id="description" name="description" class="form-control" placeholder="description..." wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity..." wire:model="quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="SKU" class="form-label">SKU</label>
                                        <input type="text" id="SKU" name="SKU" class="form-control" placeholder="SKU..." wire:model="SKU">
                                        @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label" >Stock Status</label>
                                        <select class="form-control" name="stock_status" id="stock_status" wire:model="stock_status">
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out Of Stock</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label" >Featured</label>
                                        <select class="form-control" name="featured" id="featured" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label" >Category</label>
                                        <select class="form-control" name="category_id" id="category_id" wire:model="category_id">
                                            <option value="">Select Category</option>
                                            {{$i = 0; }}
                                          @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label" >Image</label>
                                        <input type="file" id="image" name="image" class="form-control" placeholder="mage..." wire:model="image">
                                        @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="100px">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    
                                            
                                    <div class="mb-3 mt-3">
                                        <button type="submit" class="btn btn-md" >Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
