<?php

namespace App\Repositories\Eloquent;

use App\Models\Brand;
use App\Repositories\Contracts\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface
{
    public function getAll()
    {
        $brands = Brand::withUser()
            ->latest()
            ->get();

        return $brands;
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return $brand;
    }

    public function store($request)
    {
        return Brand::create($request->all());
    }

    public function update($request, $id)
    {
        $brand = Brand::findOrFail($id);

        return $brand->update($request->all());
    }

    public function getTrashed()
    {
        $brands = Brand::onlyTrashed()
            ->withUser()
            ->get();

        return $brands;
    }

    public function restore($request)
    {
        return Brand::onlyTrashed()
            ->whereKey($request->brands_id)
            ->restore();
    }

    public function restoreAll()
    {
        return Brand::onlyTrashed()
            ->restore();
    }

    public function restoreTime($time)
    {
        return Brand::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();
    }

    public function softDelete($id)
    {
        $brand = Brand::findOrFail($id);

        return $brand->delete();
    }

    public function restoreItem($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);

        return $brand->restore();
    }

    public function forceDelete($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);

        $thumbnail = $brand->thumbnail;

        // TODO: Update brand_in table products = 0
        $brand->products()->update(['brand_id' => null]);

        $brand->forceDelete();

        return $thumbnail;
    }
}
