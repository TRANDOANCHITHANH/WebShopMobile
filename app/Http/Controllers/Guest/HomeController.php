<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\Guest\Home\Homeservice;
use App\Services\Guest\Liked\LikedService;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(Homeservice $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $list_banners = $this->homeService->getAllBanner();
        $listOutstanding = $this->homeService->getProductOutstanding();
        $listSelling = $this->homeService->getProductSelling();
        $list_brands = $this->homeService->getAllBrand();
        $notification = $this->homeService->getNotification();
        $categories = $this->homeService->getCategory();
        $parentCategories = $this->homeService->getParentCategories();
        return view('guest/home', compact('list_banners', 'listOutstanding', 'listSelling', 'list_brands', 'notification', 'categories', 'parentCategories'));
    }
    public function getProductsByCategory($id)
    {
        $categoryIds = Category::where('parent_id', $id)->pluck('id')->toArray();
        if (empty($categoryIds)) {
            $categoryIds[] = $id;
        } else {
            array_unshift($categoryIds, $id);
        }
        $products = Product::whereIn('category_id', $categoryIds)->take(6)->get();
        return view('components.products_list', compact('products'))->render();
    }
}
