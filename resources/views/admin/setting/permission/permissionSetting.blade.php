{{-- TODO : Extend Layout --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{trans('adminMenu.permissions.permissions')}}</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{trans('adminMenu.permissions.roleName')}}</th>
                                <th>{{trans('adminMenu.permissions.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Roles as $role)
                            @if(in_array($role->name ,$user->checkUserPermissionLevel($user->id)))
                                <tr>
                                    <td>{{trans('adminMenu.permissions.'.$role->display_name)}}</td>
                                    <td>
{{--                                    此為進入到 app/Http/Controllers/Admin/PermissionController.php的 edit 函式--}}
                                        <a href="{{ route('admin.permission.edit', ['permission' => $role->id]) }}" class="btn btn-sm btn-secondary">@lang('form.buttons.edit')</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
