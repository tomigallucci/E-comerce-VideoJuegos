@extends('layouts.admin')
@section('title', __('Manages Game Products'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="box">

        <div class="box-header">

            <h1>{{__('Manage products')}}</h1>
            
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct">
            {{__('Add Product')}}

            </button>
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tableProducts" width="100%">
         
                <thead>
                 
                  <tr>
                   
                   <th style="width:10px">#</th>
                   <th>{{__('Image')}}</th>
                   <th>{{__('Title')}}</th>
                   <th>{{__('Stock')}}</th>
                   <th>{{__('Prices in dollars')}}</th>
                   <th>{{__("Prices in 'pesos'")}}</th>
                   <th>{{__('Languages')}}</th>
                   <th>{{__('Categories')}}</th>
                   <th>{{__('Trademarks')}}</th>
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
                <form role="form" method="post" action="{{ Route('game.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <h4 class="modal-title">Agregar producto</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
    
                                    <select class="form-control input-lg text-uppercase" id="newCategories">
                                        <option value=""
                                            >Selecionar categoría</option>
                                            @forelse ($categories as $item)
                                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty
    
                                            @endforelse
                                    </select>
                                </div>
                                <div class="container categories"></div>
                                <input type="hidden" id="listCategory" name="listCategories" />
                            </div>
    
                            <div class="form-group">
                                <div class="input-group">
                                    <!-- code -->
                                    <input type="text" class="form-control" name="code" value="{{ ($code+1) }}" readonly>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="input-group">
    
                                    <select class="form-control input-lg text-uppercase" id="newTrademark" name="trademark" required>
                                        <option value="">Selecionar Empresa</option>
                                        @forelse ($trademarks as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" name="title" placeholder="{{__('Require a title')}}" required />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="description" id="newDescription" cols="20" rows="10" style="margin: 0px;width: 511px;height: 56px;" placeholder="Descripcion..."></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" class="form-control input-lg" name="stock" min="0" placeholder="Stock" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    {{__('Release date')}} <input type="date" class="input-lg" name="releaseDate"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    ¿Es Dlc?
                                    <input type="radio" class="form-control" name="isDlc" value="1" readonly> Si
                                    <input type="radio" class="form-control" name="isDlc" value="0" readonly> No
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg" id="newPurchasePrice" name="purchase_price" min="0" step="any" placeholder="Precio de compra" required />
                                    </div>
    
                                    <div class="alert alert-warning">
                                        Ingrese valor en dolar
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg" id="newSalePrice" name="sale_price" min="0" step="any" placeholder="Precio de venta" required />
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
                                        Ganancia en porcentaje
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
                                        Valor del dolar
                                    </label>
    
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg newDollar" min="0" step="0.01" value="63.25" required />
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" id="newLanguage" placeholder="Ingresar idioma" />
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group row">
                                            <div class="col-xs-12 languages"></div>
                                        </div>
                                    </div>
    
                                    <input type="hidden" id="listLanguages" name="listLanguage" />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="panel">SUBIR IMAGEN</div>
    
                                <input type="file" class="newPhoto" name="photo" />
    
                                <p class="help-block">
                                    Peso máximo de la imagen 5MB
                                </p>
    
                                <img src="/storage/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px" />
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left btnDelete" data-dismiss="modal">
                            Salir
                        </button>
    
                        <button type="submit" class="btn btn-primary">
                            Crear producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalEditProduct" class="modal fade" role="dialog">

        <div class="modal-dialog">
    
            <div class="modal-content">
    
                <form role="form" method="post" action="{{ Route('game.edit') }}" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        
                        <h4 class="modal-title">Editar producto</h4>                    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
    
                    <div class="modal-body">
    
                        <div class="box-body">
    
                            <div class="form-group">
    
                                <div class="input-group">
    
                                    <select class="form-control input-lg text-uppercase" id="editCategories">
    
                                        <option value="">Selecionar categoría</option>
                                        @forelse ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</>
                                        @empty
                                            
                                        @endforelse
                                    </select>
    
                                </div>
                                <div class="container categories1"></div>
                                <input type="hidden" id="listCategory1" name="editListCategories" />
                            </div>
                            <div class="form-group">
    
                                <div class="input-group">
    
                                <input type="text" class="form-control" id="editCode" name="editCode" readonly>
    
                                </div>
    
                            </div>
    
                            <div class="form-group">
    
                                <div class="input-group">
    
                                    <input type="text" class="form-control input-lg" id="editTrademark" readonly>
                                    <input type="hidden" name="editTrademarkId" id="editTrademarkId">
    
    
                                </div>
                            </div>
                            <div class="form-group">
    
                                <div class="input-group">
    
    
    
                                    <input type="text" class="form-control input-lg" name="editTitle" id="editTitle" placeholder="Ingresar titulo" required>
    
                                </div>
    
                            </div>
    
                            <div class="form-group">
    
                                <div class="input-group">
    
                                    <textarea name="editDescription" id="editDescription" cols="20" rows="10" style="margin: 0px;width: 511px;height: 56px;" placeholder="Descripcion..."></textarea>
    
                                </div>
    
                            </div>
    
                            <div class="form-group">
    
                                <div class="input-group">
    
                                    <input type="number" class="form-control input-lg" name="editStock" id="editStock" min="0" placeholder="Stock" required>
    
                                </div>
    
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    {{__('Release date')}} <input type="date" class="input-lg" id="editReleaseDate" name="editReleaseDate"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    ¿Es Dlc?
                                    <input type="radio" class="form-control" name="editIsDlc" id="isDlc1" value="1" readonly> Si
                                    <input type="radio" class="form-control" name="editIsDlc" id="isDlc2" value="0" readonly> No
                                </div>
                            </div>
                            <div class="form-group row">
    
                                <div class="col-xs-12 col-sm-6">
    
                                    <div class="input-group">
    
                                        <input type="number" class="form-control input-lg" id="editPurchase_price" name="editPurchasePrice" min="0" step="any" placeholder="Precio de compra" required>
    
                                    </div>
    
                                    <div class="alert alert-warning">{{__('Price in dollar')}}</div>
    
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
    
                                    <div class="input-group">
    
                         
                                        <input type="number" class="form-control input-lg" id="editSale_price" name="editSalePrice" min="0" step="any" placeholder="Precio de venta" required>
    
                                    </div>
    
                                </div>
    
                            </div>
                            <div class="form-group row" style="width: 100%">
    
                                <div class="col-xs-12 col-sm-6">
    
                                    <label>
                                        <input type="checkbox" class="minimal percentage" checked>
                                        {{__('Gain in percentage')}}
                                    </label>
    
                                    <div class="input-group">
    
                                        <input type="number" class="form-control input-lg editPercentage" min="0" value="10" required>
    
                                                           
    
                                    </div>
    
                                </div>
    
                                <div class="col-xs-12 col-sm-6">
    
                                    <label>
                                        <input type="checkbox" class="minimal dolar" checked>
                                        {{__('Dollar value')}}
                                    </label>
    
                                    <div class="input-group">
    
                                        <input type="number" class="form-control input-lg editDollar" min="0" step="0.01" value="63.25" required>
    
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-xs-12 col-sm-6">
    
                                    <div class="input-group">
    
                                        <input type="text" class="form-control input-lg" id="editLanguages" placeholder="Ingresar idioma">
    
                                    </div>
    
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
    
                                    <div class="form-group">
    
                                        <div class="input-group row">
    
                                            <div class="col-xs-12 languages1"></div>
                                            <input type="hidden" id="listLanguages1" name="editListLanguage" />
                                        </div>

                                    </div>
    
                                </div>
    
                            </div>
                            <div class="form-group">
    
                                <div class="panel">{{__('Upload image')}}</div>
    
                                <input type="file" class="newPhoto" name="editPhoto" />
    
                                <p class="help-block">{{ __('Maximun photo weight 5Mb')}}</p>
    
                                <img src="/storage/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">
    
                                <input type="hidden" id="actualPhoto" name="actualPhoto">
    
    
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="modal-footer">
    
                        <button type="button" class="btn btn-default pull-left btnDelete" data-dismiss="modal">{{__('Exit')}}</button>
    
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
    
                    </div>
    
                </form>
    
            </div>
    
        </div>
    
    </div>
</div>
@endsection