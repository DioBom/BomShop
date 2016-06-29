<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/23
 * Time: 14:03
 * Message: 希望奶奶早日康复！
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Menu\Menu;

class MenuController extends BaseController
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        parent::__construct();
        $this->menu = $menu;
        $this->middleware('admin.auth:admin');
        view()->share([
            '_title' => '菜单管理',
            'content_header' => [
                'title' => '菜单',
                'des' => '菜单管理'
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menu->getMenuTree();

        return view('admin.menu.index')->with(['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reTree(Request $request)
    {
        dd($request->all());
    }
}
