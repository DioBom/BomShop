 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $content_header['title'] or '内容头部'}}
            <small>{{ $content_header['des'] or '内容描述' }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @section('content')
        @show
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->