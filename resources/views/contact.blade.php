@extends('layouts.master')

@section('title', __("Contact"))

@section('content')
<section class="container">
    <div class="row">   
        <div class="col-lg-8 shadow-lg" style="height: 80vh">
            <div class="box">
                @if (!empty($amsg))
                <div class="alert alert-success" role="alert">
                    {{ $amsg }}
                </div>
                @endif
                <div class="box-header">
                    <h1> Contact Form</h1>
                </div>
                    <form method="POST" action="{{ Route('mail.send')}}">
                        @csrf
                     <div class="box-body">
                
                        <label for="">{{__('E-mail')}}</label>
                        <input type="email" name="email" class="form-control" id="">
        
                        <label for="">{{__('Subject')}}</label>
                        <input type="text" class="form-control" name="subject" id="">
            
                        <label for="">{{ __('Comment')}}</label>
                        <textarea name="content" class="form-control" id="" cols="30" rows="4"></textarea>
                     </div>
                     <div class="box-footer pt-2">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Send')}}</button>
                     </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4 shadow-lg " style="height: 80vh; padding-left: 2px">
            <div class="box">
                <div class="box-header">
                    ¿Admin On?
                </div>
                <div class="box-body">
                    // socket nodejs -- SOCKET IO
                </div>
            </div>
        </div>
    </div>
</section>
@endsection