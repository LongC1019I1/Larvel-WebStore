<?php


namespace App\Http\Repositories;


interface RepositoriesInterface
{
    public function getAll();

    public function storeOrUpdate($obj);

    public function delete($obj);

    public function findById($id);

}
