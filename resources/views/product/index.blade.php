<!--
<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<h2>Ürünler</h2>

<table id="customers">
    <tr>
        <th>Adı</th>
        <th>Fiyatı</th>
        <th>Ekleyen</th>
    </tr>

@foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->created_by}}</td>
    </tr>
@endforeach

</table>

<form action="{{route('product.export')}}" method="get" enctype="multipart/form-data">
<button type="submit" class="btn btn-primary">indir</button>
</form>

</body>
</html>

-->
@extends('layouts.index-master')



@section('categories')
    <ul>
        <li class="active" data-filter="*">All</li>
        @foreach($categories as $category)
        <li data-filter=".{{$category->name}}">{{$category->name}}</li>
        @endforeach
    </ul>
@endsection





@section('featured')

    @foreach($categories as $category)
    @foreach($products as $product)
        @if($product->category_id == $category->id )
<div class="col-lg-3 col-md-4 col-sm-6 mix {{$category->name}} ">
    <div class="featured__item">
        <div class="featured__item__pic set-bg" data-setbg="{{$product->photo}}">
            <ul class="featured__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <div class="featured__item__text">
            <h6><a href="#">{{$product->name}}</a></h6>
            <h5>{{$product->price}}</h5>
        </div>
    </div>
</div>
        @endif
    @endforeach
    @endforeach

    <form action="{{route('product.export')}}" method="get">
        <button type="submit" class="btn btn-primary">Ürünleri İndir</button>
    </form>
@endsection


@section('banner')
    @foreach($banners as $banner)
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="banner__pic">
            <img src="{{$banner->photo}}" alt="">
        </div>
    </div>
    @endforeach
@endsection


@section('latest-product')
    <div class="latest-product__text">
        <h4>Latest Products</h4>
        <div class="latest-product__slider owl-carousel">

            <div class="latest-prdouct__slider__item">

                @foreach($latest_products as $product)
                <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic ">
                        <img src="{{$product->photo}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6>{{$product->name}}</h6>
                        <span>{{$product->price}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="latest-prdouct__slider__item">

                @foreach($latest_products as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->name}}</h6>
                            <span>{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('top-rated-product')
    <div class="latest-product__text">
        <h4>Top Rated Products</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">

                @foreach($latest_products as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic ">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->name}}</h6>
                            <span>{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="latest-prdouct__slider__item">
                @foreach($latest_products as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic ">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->name}}</h6>
                            <span>{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('Review Products')
    <div class="latest-product__text">
        <h4>Review Products</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">

                @foreach($latest_products as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic ">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->name}}</h6>
                            <span>{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="latest-prdouct__slider__item">
                @foreach($latest_products as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic ">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->name}}</h6>
                            <span>{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection



@section('blog')
    @foreach($blogs as $blog)
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="{{$blog->photo}}" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i>{{$blog->created_at}}</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">{{$blog->name}}</a></h5>
                <p>{{$blog->content}}</p>
            </div>
        </div>
    </div>
    @endforeach
@endsection
