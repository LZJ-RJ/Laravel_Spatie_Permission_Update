    <!--TODO : Extend Layout-->
    <!--TODO : 此ID為角色ID-->

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('js/permissionEdit.js') }}"></script>

    {{--這邊採用的是手動帶入權限的設定頁。}}
    {{TODO : 可以改良成自動抓取--}}
    <div class="account-permission">
        <div class="container content">
            <form action="{{route('updateRolePermission', ['id' => $id])}}" method="post">
                @csrf
                <section class="row info-box mb-0">
{{--                    這邊預設id=1就是Administrator(最高權限，所以不需更動此編輯權限區域)--}}
                @if($id != 1)
                    <!-- 選項 -->
                        <div id="permiOption" class="col-12 px-md-5 mb-2">
                            <div class="d-flex d-row">
                                <div class="form-group col-3 d-title">
                                    <label class="form-check-label cus-check-item">
                                        <input type="checkbox" {{in_array('adminArea', $all_permission)&&in_array('dashboard', $all_permission)?'checked':''}}/>
                                        <div class="text-normal">後台</div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label cus-check-item">
                                        <input type="checkbox" name="permission[]" value="adminArea" {{in_array('adminArea', $all_permission)?'checked':''}}/>
                                        <div class="text-normal">後台進入權限</div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label cus-check-item">
                                        <input type="checkbox" name="permission[]" value="dashboard" {{in_array('dashboard', $all_permission)?'checked':''}}/>
                                        <div class="text-normal">儀錶板</div>
                                    </label>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="d-flex d-row">
                                <div class="form-group col-3 d-title">
                                    <label class="form-check-label cus-check-item">
                                        <input type="checkbox" {{in_array('AdminMenu01', $all_permission)&&in_array('AdminMenu02', $all_permission)?'checked':''}}/>
                                        <div class="text-normal">後台菜單父親</div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label class="form-check-label cus-check-item">
                                            <input type="checkbox" name="permission[]" value="AdminMenu01" {{in_array('AdminMenu01', $all_permission)?'checked':''}}/>
                                            <div class="text-normal">後台菜單-子選項01</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label class="form-check-label cus-check-item">
                                            <input type="checkbox" name="permission[]" value="AdminMenu02" {{in_array('AdminMenu02', $all_permission)?'checked':''}}/>
                                            <div class="text-normal">後台菜單-子選項02</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>
            </form>
        </div>
    </div>
