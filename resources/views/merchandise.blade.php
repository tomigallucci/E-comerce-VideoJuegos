@extends('layouts.master')

@section('title', 'merchandise')

@section('content')
<section class="container">
    <div class="container-header">
        <h1 class="title text-center" style="font-size: 3rem">Merchandise</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="productsPreorder mainshadow">

                @forelse ($merchandise as $item)

                    <div class="item" style="width: 32%">
                        <div class="merch-title">{{$item->title}}</div>
                        <a class="cover">
                            <img src="/{{$item->image}}" class="img-thumbnail" alt="{{$item->title}}"> 
                        </a>
                    <a class="btn-block merch-btn" idProduct="{{$item->id}}">Buy</a>
                    </div>

                @empty
                    
                @endforelse

            </div>
        </div>
    </div>
</section>
@endsection