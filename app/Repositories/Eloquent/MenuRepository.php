<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/12
 * Time: 11:55
 */

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\Menu as MenuRepositoryContract;
use App\Models\Menu;

class MenuRepository extends BaseRepository implements MenuRepositoryContract
{
    public function model()
    {
        return Menu::class;
    }
}