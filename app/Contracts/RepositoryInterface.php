<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function update(array $data, $attribute, $value);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id = null);

    public function truncate();

    /**
     * @param string $attribute
     * @param string $value
     * @return mixed
     */
    public function deleteByField( string $attribute, string $value);

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'));

}