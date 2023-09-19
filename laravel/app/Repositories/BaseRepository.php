<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all data
     *
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Insert a new record
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        try {
            DB::beginTransaction();

            return $this->model->firstOrCreate($data);
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }

    }

    /**
     * Find related record by value
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function findBy($key, $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
