@extends('frontend.layout')
@section('title')
    Product Detail
@endsection
@section('content')
<main class="product-detail">

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="thumbnail">
                        <img src="https://placehold.co/450x670" alt="">
                    </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                            <div class="price d-none">US 30.5</div>
                            <div class="regular-price"><strike> US 30.5</strike></div>
                            <div class="sale-price">US 23.6</div>
                        </div>
                        <h5 class="title">Plain T-shirt</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">
                                Red ,Yellow ,Green
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">
                                XS ,S ,M ,L ,XL ,XXL
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATED PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-3">
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
            </div>
        </div>
    </section>

</main>
@endsection