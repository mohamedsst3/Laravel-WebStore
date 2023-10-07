<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
        <form  wire:submit.prevent="update_category">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" placeholder="Category Name" style="width:500px" wire:model="name" wire:keyup="generateSlug">
            <br>
            <br>
            <label for="slug">Category Slug</label>
            <input type="text" id="slug" name="slug" placeholder="Category slug" style="width:500px" wire:model="slug" >
            <br>
                <button type="submit">Add Category</button>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </div>