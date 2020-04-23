@extends('layouts.master')

@section('title','Profile')

@section('content')

    <section class="container">
        <div class="box" style="text-align: center">
            <div class="box-header">
            <h1>{{ __('User profile')}}</h1>

                @if (!$user->lastname)
                
                 <span class="alert alert-warning text-center btn-block">{{ __('Complete the missing data')}}</span>
                
                @endif
                
            </div>
            <div class="box-body">

                <form method="post" role="form" action="/profile" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group">
              
                        <div class="input-group">
                                
                        <input type="text" class="form-control input-lg" name="name" placeholder="Nombre" value="{{ ($user->name) ? $user->name : '' }}" id="editName" required>
                          
                        </div>
                          
                       </div>
                     
                       <div class="form-group">
                        
                        <div class="input-group">
                        
          
                          <input type="text" 
                          class="form-control input-lg"
                           name="lastname" value="{{ ($user->lastname) ? $user->lastname : '' }}" 
                          placeholder=" {{ __('Lastname') }}" id="editLastname" required>
                          
                        </div>
                          
                       </div>

                       <div class="form-group">
                        
                        <div class="input-group">
                        
          
                          <input type="email" class="form-control input-lg" name="email" value="{{ $user->email }}" id="editEmail" readonly>
                  
                          
                        </div>
                          
                       </div>
          
                      <div class="form-group">
                        
                        <div class="input-group">
                        
          
                          <input type="password" class="form-control input-lg" name="password" placeholder="{{ __('new password')}}">
                          <input type="hidden" name="oldPassword" value="{{ $user->password }}">
                      
                        </div>
                          
                      </div>
          
                      <div class="form-group">
                        
                        <div class="input-group">
                        
          
                          <input type="date" class="form-control input-lg" name="birthday" value="{{ ($user->birthday) ? $user->birthday : '0000-00-00'}}" required>
                          
                        </div>
                          
                       </div>
        
                       <div class="form-group">
                        
                        <div class="panel">{{ __('Upload photo') }}</div>
          
                        <input type="file" class="newPhoto" name="photo">
          
                        <p class="help-block">{{ __('Maximun photo weight 5Mb')}}</p>
          
                          @if ( $user->image ) 
                            <img src="/{{ $user->image }}" class="preview picture img-thumbnail" width="100px">
                          @else
                            <img src="/storage/img/users/default/anonymous.png" class="preview picture img-thumbnail" width="200px">
                          @endif
          
                        <input type="hidden" name="oldPhoto" value="{{ $user->image }}">
          
                      </div>
                    
                     <div class="modal-footer">

                        <button type="submit" class="btn btn-danger pull-right">{{ __('Save user')}}</button>
              
                      </div>

                </form>
                
            </div>
        </div>
    </section>

@endsection