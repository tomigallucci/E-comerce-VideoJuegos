@extends('layouts.master')

{{-- @section('title',$product->title) --}}

@section('content')

<section class="container">

    <div class="row" style="padding-top: 3%">

        <div class="col-md-3" style="margin: 0; padding: 0;">
            <img src="/{{$product->image}}" style="width: 100%">
        </div>
        <div class="col-md-8" style="padding-left: 3%">
            <div class="box">
                <div class="box-header">
                    <h2 class="title" style="font-size: 30px">
                        {{ $product->title}}
                        
                        @if ($product->isDlc)
                        - <span> DLC</span>
                        @endif
                    </h2>
                </div>
                <div class="box-body">
                    Descripción:
                    <p>{{ $product->description }}</p>
                    <div class="row">
                        <div class="col-md-6">                            
                            Generos:
                            <p> 
                                @forelse (json_decode($product->categories) as $item)
                                                                
                                    {{ $item->category}}
                                @empty

                                @endforelse
                            </p>
                        </div>
                        <div class="col-md-6">
                            Distribuidora: <p>{{ $trademark->name}}</p>
                        </div>
                        <div class="col-md-6">
                            Fecha de lanzamiento: <p> {{ $product->release_date }} </p>
                        </div>
                        <div class="col-md-6">
                            Precio: <p>${{ number_format($product->sale_price,2) }} </p>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="languages">
                                Idiomas: <p>
                                @forelse (json_decode($product->languages) as $item)
                                    @if ($item->language == "Español")
                                        
                                        <img src="https://p1.hiclipart.com/preview/879/44/975/flag-iscar-metalworking-translation-tool-spanish-language-cutting-tool-flag-of-spain-dictionary-png-clipart.jpg"
                                             width="20"
                                             alt="Español"> Español
                                        
                                    @elseif ($item->language == "Ingles")
                                        
                                        <img src="https://p7.hiclipart.com/preview/1021/906/564/flag-of-england-flag-of-the-united-kingdom-flag-of-great-britain-united-kingdom-thumbnail.jpg"
                                             width="20"
                                            alt="Ingles"> Ingles
                                        
                                    @endif     
                                
                                    @empty
                                    
                                        <img src="https://p7.hiclipart.com/preview/1021/906/564/flag-of-england-flag-of-the-united-kingdom-flag-of-great-britain-united-kingdom-thumbnail.jpg"
                                        width="20"
                                        alt="Ingles"> Ingles
                            
                                    @endforelse
                                </p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="box-footer">
                        <a class="btn btn-lg btn-success btn-block addToKart" idProduct="{{ $product->id}}">Comprar  </a>
                </div>
            </div>
        </div>
    
    </div>

</section>

@endsection
