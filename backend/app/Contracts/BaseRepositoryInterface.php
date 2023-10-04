<?php

namespace App\Contracts;

/**
 * Interface BaseRepositoryInterface
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
     */
    public function create($data);

    /**
     * Find by value
     */
    public function findBy($key, $value);

    /**
     * Update specific record
     */
    public function update($id, $data);

    /**
     * Delete specific record
     */
    public function delete($key, $value);

    /**
     * Get specific data if not exists create
     */
    public function firstOrCreate($key, $data);
}
