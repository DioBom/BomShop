@extends('admin.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ Admin::asset('css/pages/menu.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Menus</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-5">
                        <div class="dd" id="nestable">
                            @include('admin.menu.sub.tree', ['menus' => $menus])
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="box box-primary">
                            <div class="box-header">
                                dd
                            </div>
                            <div class="box-body">
                                <div id="redux"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ Admin::asset('js/pages/menu.js') }}"></script>
    <script src="{{ Admin::pluginAsset('nestable/jquery.nestable.js') }}"></script>

    <script>
        var $nestable = $('#nestable');
        var url = {
            tree: '{{ route('admin.menu.tree') }}'
        };
        $nestable.nestable();
        $nestable.on('change', function() {
            var jsonString = $nestable.nestable('serialize');

            $.post(url.tree, {data: jsonString}, function (res) {
                console.log(res);
            });
        });
    </script>
@endsection