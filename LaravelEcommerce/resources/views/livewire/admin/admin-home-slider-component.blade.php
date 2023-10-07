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
                    <span></span>  All Sliders
                </div>
            </div> 
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(Session::has('success_message'))
                          
                           <div class="alert aler-success">{{Session::get('success_message')}} </div> 
                       
                            @endif
                            <div class="card-header">
                                All Sliders
                            </div>
                            <div class="cart-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Toptitle</th>
                                            <th>Subtitle</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Offers</th>
                                            <th>Link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $i = 0;
                                        @endphp
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td> <img src="{{ asset('assets/imgs/slider')}}/{{$slider->image}}" alt="" width="400px"></td>
                                            <td>{{ $slider->top_title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $slider->offer }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>
                                                <a href="{{ route('admin.homeslider.edit', ['slider_id' => $slider->id])}}" style="background:rgb(50, 172, 50); padding: 10px; color:#fff;" >Edit</a>
                                                <a href="{{ route('admin.homeslider.delete', ['slider_id' => $slider->id])}}" style="background:rgb(186, 48, 30); padding: 10px; color:#fff;" >Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="AddNewCategory"><a href="{{route('admin.homeslider.add')}}">Add New Slider</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>