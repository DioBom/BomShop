@extends('admin.layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">创建菜单</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin::menu.store') }}" role="form" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="menuTitle" class="col-sm-2 control-label">标题：</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="menuTitle" value="{{ old('title') }}">
                                <p class="help-block">{{ $errors->first('title') ?: '用于显示的菜单标题'}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menuIcon" class="col-sm-2 control-label">图标：</label>
                            <div class="col-sm-10">
                                <input name="icon" type="text" class="form-control" id="menuIcon" value="{{ old('icon') }}">
                                <p class="help-block">font-awesome图标样式，如：fa-home</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menuURL" class="col-sm-2 control-label">地址：</label>
                            <div class="col-sm-10">
                                <input name="url" type="text" class="form-control" id="menuURL" value="{{ old('url') }}">
                                <p class="help-block">可用于系统函数url()解析的url地址，如果包含子菜单，请输入#</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menuParent" class="col-sm-2 control-label">上级菜单：</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control" id="menuParent">
                                    {!! $options !!}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
                            <label for="menuSort" class="col-sm-2 control-label">排序：</label>
                            <div class="col-sm-10">
                                <input name="sort" type="text" class="form-control" id="menuSort" value="0">
                                <p class="help-block">{{ $errors->first('sort') ?: '同级菜单有效'}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menuStatus" class="col-sm-2 control-label">状态：</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="menuStatus" value="1" checked> 启用
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0"> 禁用
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">创建</button>
                            <a href="{{ route('admin::menu.index') }}" class="btn btn-warning pull-right">取消</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ Admin::staticAsset('vue/vue.js') }}"></script>
@endsection