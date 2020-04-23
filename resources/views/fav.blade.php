@extends('layouts.master')

@section('title', __('Favorite Products'))

@section('content')
    <section class="content">
        <div class="content-header">
            <h1 class="title">Favorite Products</h1>
        </div>
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 id="fav" class="uppercase text-left" style="border-bottom:2px solid violet; margin: 0 40px">Items</h3>
                    </div>
                    <div class="box-body favList" style="padding-top: 10px">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection