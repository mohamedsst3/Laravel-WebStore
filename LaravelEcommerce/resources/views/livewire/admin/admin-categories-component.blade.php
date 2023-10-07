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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $i = ($categories->currentPage()-1)*$categories->perPage();
                                        @endphp

                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ asset('assets/imgs/categories_image')}}/{{$category->image}}" alt="{{$category->name}}" width="100px" height="100px"></td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.editcategory', ['category_id' => $category->id])}}" style="background:rgb(50, 172, 50); padding: 10px; color:#fff;" >Edit</a>
                                                <a href="{{ route('admin.deletecategory', ['category_id' => $category->id])}}" style="background:rgb(186, 48, 30); padding: 10px; color:#fff;" >Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}

                            </div>
                            <div class="AddNewCategory"><a href="{{route('admin.add.category')}}">Add New Category</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>