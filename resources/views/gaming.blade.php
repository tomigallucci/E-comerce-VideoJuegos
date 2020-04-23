@extends('layouts.master')

@section('title','Gaming')

@section('content')

    <section class="container">
        <div class="container-header">
            <h1 class="title text-center" style="font-size: 3rem">Gaming</h1>
        </div>
        <div class="row">
            
            <div class="col-md-3">
                
                <div class="box">

                    <div class="box-body">
                        
                                
                        <ul class="searchAdvanced p-0">

                            <li class="item-searchAdvanced">
                                <input type="checkbox" name="all" class="inpCheck" checked>Todo
                            </li>
                            @forelse ($categories as $item)
                            
                                <li class="item-searchAdvanced">
                                    <input type="checkbox" name="{{$item->name}}" class="inpCheck">{{ $item->name}}
                                </li>

                            @empty
                            
                            @endforelse

                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="productsPreorder mainshadow">
            
                    @forelse ($products as $item)
                    
                        <div class="item" style="width: 25%; padding: 2px">
                                            
                            <a href="gaming/{{ $item->id }}" class="cover">
                                
                                <img src="{{ $item->image }}" class="img-thumbnail" alt="{{ $item->title }}"> 
                                
                                @if ($item->isDlc == 1)

                                    <img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
                            
                                @endif


                            </a>
                        </div>
            
                    @empty
                        
                    @endforelse
                
                </div>

            </div>
        </div>
    </section>

@endsection