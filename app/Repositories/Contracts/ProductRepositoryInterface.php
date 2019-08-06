<?php


namespace App\Repositories\Contracts;


interface ProductRepositoryInterface
{
    public function all();
    public function delete(int $id);
    public function find(int $id);
    public function update(int $id, array $data = []);
    public function save(array $data = []);
}