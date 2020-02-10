<?php


namespace App\Http\Services;


interface ServicesInterface
{
    public function getAll();

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    public function findById($id);
}
