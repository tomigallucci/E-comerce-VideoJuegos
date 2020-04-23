@extends('layouts.admin')
@section('title', __('Users'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="box">
        <div class="box-header">
            <div >
                <h1>{{__('Manage users')}}</h1>
                <button class="btn btn-primary" data-toggle="model" data-target="#modalAddUser">{{__('Add User')}}</button>
                <br>
            </div>
            
        </div>
        <div class="box-body">
            <table class="table table-bordered  dt-responsive tableUser" onload="adminPanel()">
                <thead>
                    <tr>
                        <th style="width: 5px">#</th>
                        <th>{{__('Fullname')}}</th>
                        <th>{{__('E-mail')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Birthday')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Last login')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="modalEditUser" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
            <div class="modal-content" style="padding: 2px;">
                <form role="form" method="post" action="/profile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <h4 class="modal-title">{{ __('Edit user')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="name" placeholder="Nombre"  id="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="lastname" placeholder="Apellido" id="lastname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg" name="email" id="email" readonly>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control input-lg" name="password" placeholder="{{__('new password')}}">
                                <input type="hidden" name="oldPassword" id="oldPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control input-lg" name="birthday" id="birthday" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">{{__('Upload photo')}}</div>
                            <input type="file" class="newPhoto" name="photo">
                            <p class="help-block">{{__('Maximun photo weight 5Mb')}}</p>
                            <div class="img" style="text-align: center;">
                                <img src="/storage/img/users/default/anonymous.png" class="preview picture" width="100px">
                            </div>
                            <input type="hidden" name="oldPhoto" id="oldPhoto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('Exit')}}</button>
                        <button type="submit" class="btn btn-danger pull-right">{{ __('Save user')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- // TERMINAR ESTO // --}}
    <div id="modalAddUser" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
            <div class="modal-content" style="padding: 2px;">
                <form role="form" method="post" action="/profile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <h4 class="modal-title">{{ __('Edit user')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="name" placeholder="Nombre"  id="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="lastname" placeholder="Apellido" id="lastname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg" name="email" id="email" readonly>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control input-lg" name="password" placeholder="{{__('new password')}}">
                                <input type="hidden" name="oldPassword" id="oldPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control input-lg" name="birthday" id="birthday" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">{{__('Upload photo')}}</div>
                            <input type="file" class="newPhoto" name="photo">
                            <p class="help-block">{{__('Maximun photo weight 5Mb')}}</p>
                            <div class="img" style="text-align: center;">
                                <img src="/storage/img/users/default/anonymous.png" class="preview picture" width="100px">
                            </div>
                            <input type="hidden" name="oldPhoto" id="oldPhoto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('Exit')}}</button>
                        <button type="submit" class="btn btn-danger pull-right">{{ __('Save user')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection