@extends('frontend.layout')
@section('title')
    Shop
@endsection
@section('content')
<main class="shop">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-4">
                                <figure>
                                    <div class="thumbnail">
                                        <div class="status">
                                            Promotion
                                        </div>
                                        <a href="">
                                            <img src="https://placehold.co/450x670" alt="">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <div class="price-list">
                                            <div class="price d-none">US 10</div>
                                            <div class="regular-price "><strike> US 15</strike></div>
                                            <div class="sale-price ">US 12</div>
                                        </div>
                                        <h5 class="title">T-Shirt 001</h5>
                                    </div>
                                </figure>
                            </div>
                        @endfor
                        
                        <div class="col-12">
                            <ul class="pagination">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li>
                                        <a href="/shop?page={{$i}}">{{$i}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        <li>
                            <a href="/shop?cat=">Men</a>
                        </li> 
                        <li>
                            <a href="/shop?cat=">Women</a>
                        </li> 
                        <li>
                            <a href="/shop?cat=">Girl</a>
                        </li> 
                        <li>
                            <a href="/shop?cat=">Boy</a>
                        </li> 
                    </ul>
                    
                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?price=max">High</a>
                        <a href="/shop?price=min">Low</a>
                    </div>

                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?promotion=true">Promotion Product</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection