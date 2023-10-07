<div>
<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
    display: block;
    }
    .wishlisted{
      background: #f15412 !important; /* it will override ALL previous styling rules for that specific property on that elemen*/
      border: 1px solid transparent !important;
    }
    .wishlisted i{
        color: #fff !important;
    }
   </style>
   
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
            <div class="row product-grid-4">
                @foreach(Cart::instance('wishlist')->content() as $item)
                <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('product.detail', ['slug' => implode('-', explode(' ',$item->name)) ])}}">
                                    <img class="default-img" src="{{ asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpg" alt="">
                                    <img class="hover-img" src="{{ asset('assets/imgs/shop/product-')}}{{$item->id}}-2.jpg" alt="">
                                </a>
                            </div>
                            {{-- <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-search"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                            </div> --}}
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop.html">Music</a>
                            </div>
                            <h2><a href="product-details.html">{{ $item->name }}</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                    <span>90%</span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>${{$item->regular_price}}</span>
                            </div>
                            <div class="product-action-1 show">
                                <a aria-label="Remove This Item" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="RemoveItemFromWishliast({{$item->id}})"><i class="fi-rs-heart"></i></a>
                              
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

</div>