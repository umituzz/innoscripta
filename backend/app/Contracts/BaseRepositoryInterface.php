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

    /**
     * Get total record of table
     */
    public function total();

    /**
     * Insert a new record
     *
     * @param $data
     */
    public function create($data);

    /**
     * Find by value
     *
     * @param $key
     * @param $value
     */
    public function findBy($key, $value);

    /**
     * Update specific record
     *
     * @param $id
     * @param $data
     */
    public function update($id, $data);

    /**
     * Delete specific record
     *
     * @param $key
     * @param $value
     */
    public function delete($key, $value);

    /**
     * Get specific data if not exists create
     *
     * @param $key
     * @param $data
     */
    public function firstOrCreate($key, $data);

}
