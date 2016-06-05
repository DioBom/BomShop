<?php
/** +----------------------------------------------------------------------
 * | KeepMoving
 * +----------------------------------------------------------------------
 * | Date : 16/6/5 下午4:08
 * +----------------------------------------------------------------------
 * | Author: WuXueHai '<367052992@qq.com>'
 * +----------------------------------------------------------------------*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
        return View('Admin.login');
    }
}