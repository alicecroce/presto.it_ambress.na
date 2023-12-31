<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Http\Requests\StoreAdvRequest;
use App\Http\Requests\UpdateAdvRequest;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advs = Adv::orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(12);
        $categories = Category::all();

        return view('adv.index', compact('advs', 'categories'));
    }



    public function categoryFilter(Category $categories)
    {

        //$categoriesFiltered = Adv::where('category_id')->get();

        // return view('adv.index', ['categoriesFilt' => $categoriesFiltered, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Adv $adv)
    {
        $categories = Category::all();
        return view('adv.show', compact(['adv', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adv $adv)
    {
        return view('adv.edit', compact('adv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Adv $adv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adv $adv)
    {
        //
    }
}
