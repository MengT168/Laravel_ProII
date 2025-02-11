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
                        <img src="/uploads/{{$product[0]->thumbnail}}" width="100%" alt="">
                    </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                        @if ($product[0]->sale_price >0)
                            <div class="regular-price "><strike> US {{$product[0]->regular_price}}</strike></div>
                            <div class="sale-price ">US {{$product[0]->sale_price}}</div>
                        @else
                            <div class="price">US {{$product[0]->regular_price}}</div>
                        @endif 
                        </div>
                        <h5 class="title">{{$product[0]->name}}</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">
                            {{$product[0]->attribute_color}}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">
                            {{$product[0]->attribute_size}}
                            </div>
                        </div>
                        <div class="group-size" >
                            <form method="post" action="/add-cart" style="width: 250px; display: flex; gap: 10px; " >
                                @csrf
                                @if (Auth::check()==1)
                                    @php
                                        $userId = Auth::user()->id;
                                    @endphp
                                @else
                                    @php
                                        $userId = 0;
                                    @endphp
                                @endif
                                <input type="hidden" value="{{$product[0]->id}}" name="proId" >
                                <input type="hidden" value="{{$userId}}" name="userId" >
                                <input type="number" class="form-control" style="width:  60px;" value="1" name="qty" >
                                <button class="btn btn-primary mt-2" style="width: 150px;" >Add to cart</button>
                            </form>
                        </div>
                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">
                            {{$product[0]->description}}
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
                    @foreach ($relatedProduct as $relatedProductValue )
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    @if ($relatedProductValue->sale_price >0)
                                        <div class="status">
                                            Promotion
                                        </div>
                                    @endif
                                    <a href="/product">
                                        <img src="/uploads/{{$relatedProductValue->thumbnail}}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                    @if ($relatedProductValue->sale_price >0)
                                        <div class="regular-price "><strike> US {{$relatedProductValue->regular_price}}</strike></div>
                                        <div class="sale-price ">US {{$relatedProductValue->sale_price}}</div>
                                    @else
                                     <div class="price">US {{$relatedProductValue->regular_price}}</div>
                                    @endif 
                                    </div>
                                    <h5 class="title">{{$relatedProductValue->name}}</h5>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
        </div>
    </section>

</main>
@endsection