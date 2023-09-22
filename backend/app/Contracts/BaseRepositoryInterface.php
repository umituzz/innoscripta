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
}
