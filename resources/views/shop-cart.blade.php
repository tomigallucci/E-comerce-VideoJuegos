@extends('layouts.master')

@section('title', __('Shopping cart'))

@section('content')
    <section class="content">
        <div class="content-header">
            <h1 class="title">Shopping cart</h1>
        </div>
        <div class="box">
            <div class="row">
                <div class="col-md-7">
                    <div class="box-header">
                        <h3 id="item" class="uppercase text-left" style="border-bottom:2px solid violet; margin: 0 40px">Items</h3>
                    </div>
                    <div class="box-body cartList" style="padding-top: 10px">
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="uppercase text-left" style="border-bottom:2px solid green; margin: 0 40px">{{ __('Order summary')}}</h3>
                        </div>
                        <div class="box-body">
                            <br>
                            
                            <input type="text"  
                            class="form-control" 
                            id="couponDescount" 
                            placeholder="&#xf02b; {{  __('Have a promo code?') }}"
                             style="font-family:Arial, FontAwesome
                            ; border: 1px solid black;
                            margin-left: 40px;
                            width: 85%
                            margin-top: 11px;" />

                            <div class="form-group t">
                               <p> {{ __('Merchandise:')}}</p><p id="cantMerch">$$$$$$</p>
                            </div>
                            <div class="form-group t">
                            <p>{{ __('Estimated Shopping:') }}</p><p id="estMerch">$$$$$$</p>
                             </div>
                             <div class="form-group t c">
                                <p>{{ __('Tax: 21%') }}</p><p id="taxMerch">$$$$$$</p>
                            </div>
                             <hr>
                             <div class="form-group uppercase t">
                                <p><b>{{ __('Order total:') }}</b></p><p id="totalMerch">$$$$$$</p>
                            </div>

                             <button class="btn btn-primary btn-block" style="width: 85%;  margin-left: 40px;">{{__('Buy')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection