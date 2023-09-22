<?php

namespace App\Contracts;

/**
 * Interface BaseRepositoryInterface
 * @package App\Contracts
 */
interface BaseRepositoryInterface
{
    /**
     * Get all data
     *
     * @return mixed
     */
    public function get();

    public function total();

    /**
     * Insert a new record
     *
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * Find by value
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function findBy($key, $value);

    public function update($id, $data);

    public function delete($id);

    public function firstOrCreate($key, $data);

}
