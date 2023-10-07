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
                    <span></span>  All sliders
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
                             <form wire:submit.prevent="StoreNewSlider">
                                <div class="mb-3 mt-3">
                                    <label for="toptitle">Top Title</label>
                                    <input type="text" name="top_title" id="toptitle" class="form-control" width="300px" placeholder="Top Title..." wire:model="top_title">
                                    @error('top_title')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" width="300px" placeholder="Title..." wire:model="title">
                                    @error('title')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="subtitle">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" id="subtitle" width="300px" placeholder="Sub Title" wire:model="sub_title">
                                    @error('sub_title')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="status">Status</label>
                                    <select  name="status" id="status" class="form-control" wire:model="status">
                                     <option value="1">Active</option>
                                     <option value="0">InActive</option>
                                    </select>
                                    @error('status')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="offer">Offer</label>
                                    <input type="text" name="offer" id="offer" class="form-control" width="300px" placeholder="Offer.." wire:model="offer">
                                    @error('offer')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" id="link" width="300px" placeholder="Link" wire:model="link">
                                    @error('link')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" width="300px" wire:model="image">
                                    @error('image')
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