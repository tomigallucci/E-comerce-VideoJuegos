@extends('layouts.admin')
@section('title', __('Manages Game Products'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="box">

        <div class="box-header">

            <h1>{{__('Manage merchandise')}}</h1>
            
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct">
            {{__('Add merchandise')}}

            </button>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tableMerchandise" width="100%">
         
                <thead>
                 
                  <tr>
                   
                   <th style="width:10px">#</th>
                   <th>{{__('Image')}}</th>
                   <th>{{__('Title')}}</th>
                   <th>{{__('Stock')}}</th>
                   <th>{{__('Prices in dollars')}}</th>
                   <th>{{__("Prices in 'pesos'")}}</th>
                   <th>{{__('Agregated')}}</th>
                   <th>{{__('Actions')}}</th>
                   
                 </tr> 
        
                </thead>
        
            </table>
        
        </div>
    </div>
    <div id="modalAddProduct" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="post" action="{{ Route('merchandise.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <h4 class="modal-title">{{ __('Add merchandise')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <div class="box-body">
                            

                            <div class="form-group">
                                <div class="input-group">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-lg" name="code" value="{{ ($code+1) }}" readonly>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                     <div class="col-md-6">
                                       <input type="text" name="title" class="form-control input-lg @error('title') is-invalid @enderror"  value="{{ old('title') }}" required autocomplete="title" autofocus>
                                     
                                       @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" min="0" name="stock" class="form-control input-lg @error('stock') is-invalid @enderror"  value="{{ old('stock') }}" required autocomplete="stock" autofocus>
                                     
                                       @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="newPurchasePrice" class="col-md-4 col-form-label text-md-right">{{ __('Purchase price') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" name="purchase_price" class="form-control @error('title') is-invalid @enderror" min="0" step="any" id="newPurchasePrice" value="{{ old('purchase_price') }}" required autocomplete="purchase_price" autofocus>
                                        
                                       @error('purchase_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="margin: 10px auto;">
                                    <div class="alert alert-warning text-center">
                                        {{__('Price in dollar')}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="newSalePrice" class="col-md-4 col-form-label text-md-right">{{ __('Sales price') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" name="sale_price" id="newSalePrice" class="form-control @error('sale_price') is-invalid @enderror"  value="{{ old('sale_price') }}"  min="0" step="any"  required autocomplete="sale_price" autofocus>
                                     
                                       @error('sale_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
    
                            <div class="form-group row" style="width: 100%">
                                <div class="col-xs-12 col-sm-6">
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="minimal percentage"
                                            checked
                                        />
                                        {{__("Gain in percentage ")}}
                                    </label>
    
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg newPercentage" min="0" value="10" required />
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="minimal dolar"
                                            checked
                                        />
                                        {{__('Dollar value')}}
                                    </label>
    
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg newDollar" min="0" step="0.01" value="63.25" required />
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="panel">{{__('Upload image')}}</div>
    
                                <input type="file" class="newPhoto" name="photo" />
    
                                <p class="help-block">{{ __('Maximun photo weight 5Mb')}}</p>
    
                                <img src="/storage/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px" />
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                            {{__('Exit')}}
                        </button>
    
                        <button type="submit" class="btn btn-primary">
                            {{__('Create')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalEditProduct" class="modal fade" role="dialog">

        <div class="modal-dialog">
    
            <div class="modal-content">
    
                <form role="form" method="post" action="{{ Route('merchandise.edit') }}" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        
                        <h4 class="modal-title">{{__('Edit merchandise')}}</h4>                    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
    
                    <div class="modal-body">
                        <div class="box-body">
                            

                            <div class="form-group">
                                <div class="input-group">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-lg" name="editCode" id="editCode" readonly>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                     <div class="col-md-6">
                                       <input type="text" name="editTitle" id="editTitle" class="form-control input-lg @error('editTitle') is-invalid @enderror"  value="{{ old('editTitle') }}" required autocomplete="editTitle" autofocus>
                                     
                                       @error('editTitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" min="0" name="editStock" id="editStock" class="form-control input-lg @error('editStock') is-invalid @enderror"  value="{{ old('editStock') }}" required autocomplete="editStock" autofocus>
                                     
                                       @error('editStock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="newPurchasePrice" class="col-md-4 col-form-label text-md-right">{{ __('Purchase price') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" name="editPurchasePrice" class="form-control @error('title') is-invalid @enderror" min="0" step="any" id="editPurchase_price" value="{{ old('editPurchasePrice') }}" required autocomplete="editPurchasePrice" autofocus>
                                        
                                       @error('editPurchasePrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="margin: 10px auto;">
                                    <div class="alert alert-warning text-center">
                                        {{__('Price in dollar')}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="input-group">
                                     <label for="newSalePrice" class="col-md-4 col-form-label text-md-right">{{ __('Sales price') }}</label>
                                     <div class="col-md-6">
                                       <input type="number" name="editSalePrice" id="editSale_price" class="form-control @error('editSalePrice') is-invalid @enderror"  value="{{ old('editSalePrice') }}"  min="0" step="any"  required autocomplete="editSalePrice" autofocus>
                                     
                                       @error('editSalePrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
    
                            <div class="form-group row" style="width: 100%">
                                <div class="col-xs-12 col-sm-6">
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="minimal percentage"
                                            checked
                                        />
                                        {{__("Gain in percentage ")}}
                                    </label>
    
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg newPercentage" min="0" value="10" required />
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="minimal dolar"
                                            checked
                                        />
                                        {{__('Dollar value')}}
                                    </label>
    
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg newDollar" min="0" step="0.01" value="63.25" required />
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="panel">{{__('Upload image')}}</div>
    
                                <input type="file" class="newPhoto" name="editPhoto" />
    
                                <p class="help-block">{{ __('Maximun photo weight 5Mb')}}</p>
    
                                <img src="/storage/img/merchandise/default/anonymous.png" class="img-thumbnail preview" width="100px">
    
                                <input type="hidden" id="actualPhoto" name="actualPhoto">
    
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
    
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('Exit')}}</button>
    
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
    
                    </div>
    
                </form>
    
            </div>
    
        </div>
    
    </div>
</div>
@endsection