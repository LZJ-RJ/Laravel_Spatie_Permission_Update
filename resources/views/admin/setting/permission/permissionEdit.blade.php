    <!--TODO : Extend Layout-->
    <!--TODO : 此ID為角色ID-->

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('js/permissionEdit.js') }}"></script>

    <div class="account-permission">
        <div class="container content">
            <h3>{{trans('form.userRole.'.$roleName)}}</h3>
            <form action="{{$dataArr['formSetting']['action']}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="card">
                    <div class="card-header">{{trans('adminMenu.permissions.Permissions')}}</div>
                    <div class="card-body">
                        <div id="permiOption" class="col-12 px-md-5 mb-2">
                            @foreach($RolehasPermissions as $index => $permissions)
                                @if($index == 0)
                                    <div class="d-flex d-row">
                                        <div class="form-group col-3 d-title">
                                            <div>
                                                <label class="form-check-label cus-check-item">
                                                    <input type="checkbox" name="permission[]" value="{{$permissions['displayName']}}" {{in_array($permissions['displayName'], $Permissions)?'checked':''}}/>
                                                    <div class="text-normal">{{trans('adminMenu.items.'.
                                            (str_replace(' ', '.', trim($permissions['name']))))}}</div>
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                        @if(in_array('parent', explode(' ', $permissions['name'])))
                                            @if($index >= 2)
                                    </div>
                                    <hr class="m-0">
                                    {{--        上面這兩行是補結尾的--}}
                                @endif
                                <div class="d-flex d-row">
                                    {{--            上面這行是補開頭的--}}
                                    <div class="form-group col-3 d-title">
                                        <div>
                                            <label class="form-check-label cus-check-item">
                                                <input type="checkbox" name="permission[]" value="{{$permissions['displayName']}}" {{in_array($permissions['displayName'], $Permissions)?'checked':''}}/>
                                                <div class="text-normal">{{trans('adminMenu.items.'.
                                            (str_replace(' ', '.', trim($permissions['name']))))}}</div>
                                            </label>
                                        </div>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <div>
                                                <label class="form-check-label cus-check-item">
                                                    <input type="checkbox" name="permission[]" value="{{$permissions['displayName']}}" {{in_array($permissions['displayName'], $Permissions)?'checked':''}}/>
                                                    <div class="text-normal">{{trans('adminMenu.items.'.
                                            (str_replace(' ', '.', trim($permissions['name']))))}}</div>
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    @if($index == 0)
                                </div>
                                <hr class="m-0">
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12 px-md-5 mb-5">
                            <button class="btn btn-xs btn-primary text-white float-right">{{trans('form.buttons.update')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
