<?php

namespace App\Repositories\Contracts;


interface BrandRepositoryInterface
{
    public function getAll();

    public function edit($id);

    public function store($request);

    public function update($request, $id);

    public function getTrashed();

    public function restore($request);

    public function restoreAll();

    public function restoreTime($time);

    public function softDelete($id);

    public function restoreItem($id);

    public function forceDelete($id);
}
