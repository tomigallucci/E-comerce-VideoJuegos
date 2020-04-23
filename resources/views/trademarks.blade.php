@extends('layouts.admin')
@section('title', __('Trademarks'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="box">

        <div class="box-header with-border">
    
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddTrademark">
            
            {{__('Add Trademark')}}
  
          </button>
  
        </div>
  
        <div class="box-body">
          
         <table class="table table-bordered table-striped dt-responsive tableTrademarks" width="100%">
   
              <thead>
              
                  <tr>
                      
                      <th style="width:10px">#</th>
                      <th>{{ __('Trademark')}}</th>
                      <th>{{__('Created at')}}</th>
                      <th>{{ __('Actions')}}</th>
  
                  </tr> 
  
              </thead>
  
          </table>
  
          </div>
  
      </div>
      <div id="modalAddTrademark" class="modal fade" role="dialog">
    
        <div class="modal-dialog">
      
          <div class="modal-content">
      
            <form role="form" method="post" action="{{ Route('trademark.create')}}">
                @csrf
              <div class="modal-header" style="background:#3c8dbc; color:white">
      
                <h4 class="modal-title">{{__('Add category')}}</h4>
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      
              </div>
      
        <div class="modal-body">
      
            <div class="box-body">
            
                <div class="form-group">
                    
                    <div class="input-group">
                          
                      <input type="text" class="form-control input-lg" name="trademark" required>

                    </div>
      
                  </div>
        
                </div>
      
              </div>
    
              <div class="modal-footer">
      
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Exit')}}</button>
      
                <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
      
              </div>
      
            </form>
      
          </div>
      
        </div>
      
      </div>
      <div id="modalEditTrademark" class="modal fade" role="dialog">
    
        <div class="modal-dialog">
      
          <div class="modal-content">
      
            <form role="form" method="post" action="{{ Route('trademark.edit')}}">
                @csrf
                @method('PUT')
              <div class="modal-header" style="background:#3c8dbc; color:white">
      
                <h4 class="modal-title">{{__('Edit category')}}</h4>
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      
              </div>
      
        <div class="modal-body">
      
            <div class="box-body">
            
                <div class="form-group">
                    
                    <div class="input-group">
                    
      
                      <input type="text" class="form-control input-lg" name="editTrademark" id="editTrademark" required>
      
                       <input type="hidden"  name="idTrademark" id="idTrademark" required>
      
                    </div>
      
                  </div>
        
                </div>
      
              </div>
    
              <div class="modal-footer">
      
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Exit')}}</button>
      
                <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
      
              </div>
      
            </form>
      
          </div>
      
        </div>
      
      </div>
</div>
@endsection