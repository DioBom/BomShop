<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/16
 * Time: 10:59
 */

namespace App\Services\Menu;

use App\Contracts\Repositories\Menu as Repository;
use App\Support\Tree;

class Menu
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getMenuList()
    {
        return $this->repository->all()->toArray();
    }

    public function getSidebarMenuView()
    {

    }

    public function getMenuTree()
    {
        $lists = $this->getMenuList();
        $tree = new Tree($lists);

        return $tree->toTree();
    }

    public function reTree($data)
    {

    }
}