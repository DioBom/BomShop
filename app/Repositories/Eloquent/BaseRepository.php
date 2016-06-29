<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/12
 * Time: 11:32
 */

namespace App\Repositories\Eloquent;

use Illuminate\Container\Container as Application;
use App\Contracts\Repositories\Base;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Base
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->boot();
    }

    /**
     * 指定模型名称
     * @return string
     */
    abstract public function model();

    public function boot()
    {

    }

    /**
     * @return Model
     */
    public function newModel()
    {
        return $this->app->make($this->model());
    }

    public function count()
    {
        return $this->newModel()->count();
    }

    public function all($columns = ['*'])
    {
        return $this->newModel()->all($columns);
    }

    public function paginate($perPage = null, $columns = ['*'])
    {
        return $this->newModel()->paginate($perPage, $columns);
    }

    public function simplePaginate($perPage = null, $columns = ['*'])
    {
        return $this->newModel()->simplePaginate($perPage, $columns);
    }

    public function first($columns = ['*'])
    {
        return $this->newModel()->first($columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->newModel()->find($id, $columns);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->newModel()->findOrFail($id, $columns);
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->newModel()->where($field, '=', $value)->get($columns);
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        $model = $this->newModel();

        foreach ($where as $field => $value) {

            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $model->where($field, $condition, $val);
            } else {
                $model->where($field, '=', $value);
            }
        }

        return $model->get($columns);
    }

    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        return $this->newModel()->whereIn($field, $values)->get($columns);
    }

    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        return $this->newModel()->whereNotIn($field, $values)->get($columns);
    }

    public function create(array $attributes)
    {
        $model = $this->newModel()->fill($attributes);

        return $model->save() ? $model : false;
    }

    public function update(array $attributes, $id)
    {
        $model = $this->findOrFail($id);

        return $model->update($attributes);
    }

    public function delete($id)
    {
        $model = $this->findOrFail($id);

        return $model->delete();
    }

    public function with($relations)
    {
        return $this->newModel()->with($relations);
    }
}