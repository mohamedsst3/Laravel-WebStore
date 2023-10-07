<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span>  All Categories
                    <span></span> Your Cart
                </div>
            </div> 
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(Session::has('success_message'))
                            <div>
                            {{Session::get('success_message')}}
                            </div>
                            @endif
                            <div class="card-header">
                                All Categories
                            </div>
                            <div class="cart-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>stock</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $i = ($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}" width="60px"></td>
                                            <td>{{ $product->category->name }} </td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ $product->slug }}</td>
                                          
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}

                            </div>
                            <div class="AddNewCategory"><a href="{{route('admin.add.product')}}">Add New Product</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>