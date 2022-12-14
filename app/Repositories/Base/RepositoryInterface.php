<?php

namespace App\Repositories\Base;

interface RepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
