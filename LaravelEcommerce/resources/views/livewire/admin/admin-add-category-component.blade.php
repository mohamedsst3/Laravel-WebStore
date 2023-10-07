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
                </div>
            </div> 
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Add New Slider
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.categories')}}">All Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                             <form wire:submit.prevent="store">
                                <div class="mb-3 mt-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" width="300px" placeholder="Category Name" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="image"> Image</label>
                                    <input type="file" name="image" id="image" width="300px" wire:model="image">
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" alt="" width="200px">

                                    @endif
                                    @error('image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

        

                                <div class="mb-3 mt-3">
                                    <label for="is_popular">Is Popular</label>
                                    <select  name="is_popular" id="is_popular" width="300px" wire:model="is_popular">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('is_popular')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit">Create</button>
                             </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>