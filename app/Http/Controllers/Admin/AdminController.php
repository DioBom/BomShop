<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\User\User;

class AdminController extends BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();

        $this->middleware('admin.auth:admin');

        $this->user = $user;
    }

    public function index()
    {
        return view('admin.index');
    }


}
