<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/12
 * Time: 11:32
 */

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\User as UserRepositoryContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function model()
    {
        return User::class;
    }
}