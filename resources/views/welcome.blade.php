@extends('layouts.master')
@section('title', '4EGames')
@section('content')
<section class="container">
    <div class="content-header" style="text-align: center;background: url(https://www.clavecd.es/wp-content/uploads/Call-of-Duty-Modern-Warfare-banner-2.png); margin: 0;height: 22vh;padding: 0px;" width="100vw">		
                        
        <div>BACKGROUND</div>
                
    </div>

    <div class="row">
        
        <div class="col-md-3 h-x">
            
            <div class="box">

                <div class="box-body">
                    
                    
                    <div class="row">

                        <div class="col-6">
                            
                            <ul class="list-platform">
                                <li>
                                    <div class="item-platform">
                                        <img style="width: 40px" src="/storage/img/platform/steam.jpg" alt=""><span>Steam</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/origin.png" alt=""><span>Origin</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/rockstart.png" alt=""><span>Rockstar</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/xbox.png" alt=""><span>Xbox</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <span>Indies</span>	
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="col-6">
                            <ul class="list-platform">
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/ubisoft.png" alt=""><span>Uplay</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/th.jpg" alt=""><span>Battle.net</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/nintendo.png" alt=""><span>Nintendo</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <img style="width: 40px" src="/storage/img/platform/ps.png" alt=""><span>Playstation</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-platform">

                                        <span>Otros</span>	
                                    </div>
                                </li>
                            </ul>
                
                        </div>
                    </div>
                    <ul>

                    @forelse ($categories as $item)
                        <li class="item-searchAdvanced"> {{ $item->name }} </li>
                    @empty
                        
                    @endforelse
                        <li class="item-searchAdvanced">
                            <small style="padding: 20px">
                                <a href="{{ Route('searchAdvanced') }}">
                                    ...
                                </a>
                            
                            </small>
                        </li>
                    </ul>

                </div>

            </div>

        </div>
        <div class="col-md-7" style="margin: 0; padding: 0;">
            
            <div class="box">
                
                <div class="box-body">
                    
                    <div class="productsPreorder mainshadow">
                        @forelse ($products as $item)
                        <div class="item" style="width: 40%; padding: 2px;">
                                
                            <div class="clock delivered" style="margin-top: 2px">
                            
                                <span>
                                    Disponible
                                </span>

                            </div>
                                <a href="" class="cover">
                                    
                                <img src="{{ $item->image }}" class="img-thumbnail" alt="{{ $item->title }}"> 
                                    
                                    @if ($item->isDlc == 1)

                                        <img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
                                        
                                    @endif
                                    
                                    <div class="shadow">

                                        <span class="discount">{{ $item->discount }}% OFF</span>

                                        <span class="price" style="padding-left: 20px">{{ number_format($item->sale_price,1) }}</span>

                                    </div>

                                </a>
                                <div class="btn-group">
                                    <button class="btn btn-success addToKart" idProduct={{ $item->id }} rel="nofollow" >
                                        Comprar
                                    </button>
                                    <a class="btn btn-primary btn-block addToFav" idProduct={{ $item->id }}><i class="fa fa-heart" style="font-size:25px; color: red;"></i></a>
                                </div>
                                
                            </div>
                        @empty
                            
                        @endforelse

                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-2 h-x" style="padding: 0 20px 0 5px">
            
            <div class="box">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header">

                        </div>
                       
                        <div class="box-body">
                            <div class="countdown">
                                {{__('Offer of the day')}}
                                <div id="clock"></div>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 400px">
                        <div class="box-header">
                            COMENTARIOS
                        </div>
                        <div class="box-body">
                            COMENTARIOS
                        </div>
                    </div>
                </div>
                {{-- <div class="box-header" style="text-align: center;">
                    OFERTDA DEL DIA

                    <div id="clock" style="margin: 0"></div>

                </div>
                    
                <div class="box-body">ULTIMOS COMENTARIOS</div> --}}

            </div>

        </div>
    </div>
</section>

@endsection