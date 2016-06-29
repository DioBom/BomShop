<ol class="dd-list">
@foreach($menus as $menu)
    <li class="dd-item dd3-item" data-id="{{ $menu['id'] }}">
        <div class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content">
            <i class="{{ $menu['icon'] }}"></i>
            <span>{{ $menu['title'] }}</span>
            <span class="tools">
                <i class="fa fa-edit data-action" data-action="edit" data-id="{{ $menu['id'] }}"></i>
                <i class="fa fa-trash-o data-action" data-action="delete" data-id="{{ $menu['id'] }}"></i>
            </span>
        </div>
        @if(isset($menu['_child']) && !empty($menu['_child']))
            @include('admin.menu.sub.tree', ['menus' => $menu['_child']])
        @endif
    </li>
@endforeach
</ol>