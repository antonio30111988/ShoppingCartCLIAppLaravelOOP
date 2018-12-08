<?php namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all()->toArray();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function update(array $data, $attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->update($data);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id = null)
    {
        return $this->model->destroy($id);
    }

    /**
     * @return mixed
     */
    public function truncate()
    {
        return $this->model->truncate();
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return mixed
     */
    public function deleteByField( string $attribute, string $value)
    {
        return $this->model->where($attribute, '=', $value)->delete();
    }

    /**
     * @param $id
     * @return Model
     */
    public function show($id, $columns = array('*'))
    {
        return $this->model-find($id, $columns);
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
