<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->viewComposer();
    }

    private function viewComposer()
    {
        // Category product
        view()->composer(['frontend.layouts.header', 'frontend.layouts.sidebar-categories', 'frontend.layouts.footer'], function ($view) {
            $categoriesProduct = Category::ofTypeProduct()
                ->published()
                ->sortByOrder()
                ->arrayToTree();

            $view->with(compact('categoriesProduct'));
        });

        // Category post
        view()->composer(['frontend.layouts.header', 'frontend.layouts.footer'], function ($view) {
            $categoriesPost = Category::ofTypePost()
                ->published()
                ->sortByOrder()
                ->arrayToTree();

            $view->with(compact('categoriesPost'));
        });

        // Brands
        view()->composer('frontend.layouts.footer', function ($view) {

            $brands = Brand::published()
                ->get();

            $view->with(compact('brands'));
        });

        // Featured product
        view()->composer(['frontend.layouts.sidebar-featured-products', 'frontend.home.main'], function ($view) {
            $featuredProducts = Product::published()
                ->ofFeature()
                ->latest()
                ->get();

            $view->with(compact('featuredProducts'));
        });

        // Tag
        view()->composer('frontend.layouts.sidebar-tags', function ($view) {
            $tags = Tag::published()
                ->get();

            $view->with(compact('tags'));
        });

        // Notification
        view()->composer(['backend.layouts.notification', 'backend.notification.index', 'backend.dashboard.main'], function ($view) {
            $count = Notification::countUnread();

            $notifications = Notification::latest()
                ->get();

            $view->with(compact('notifications', 'count'));
        });
    }
}
