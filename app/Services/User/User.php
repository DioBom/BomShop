<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/15
 * Time: 14:31
 */

namespace App\Services\User;

use App\Contracts\Repositories\User as Repository;

class User
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getUserList()
    {
        return $this->repository->all()->toArray();
    }
}