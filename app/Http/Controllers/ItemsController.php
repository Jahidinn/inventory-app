<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use App\Models\Category;
use App\Models\Unit;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('apps.items.index', [
            'items' => Items::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.items.create', [
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|max:255',
            'item_id' => 'required|unique:Items',
            'measuring_unit_id' => 'required',
            'description' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['price'] = preg_replace('/[^0-9]/', '', $request->price);

        Items::create($validatedData);

        return redirect('/apps/items')->with('success', 'New items has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $item)
    {
        if (!auth()->user()) {
            abort(403);
        }

        return view('apps.items.show', [
            'item_detail' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $item)
    {
        if (!auth()->user()) {
            abort(403);
        }

        return view('apps.items.edit', [
            'item_detail' => $item,
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $item)
    {
        $rules = [
            'name' => 'required|max:255',
            'category_id' => 'required|max:255',
            'measuring_unit_id' => 'required',
            'description' => 'required'
        ];

        //Jika tidak ada perubahan pada item id/slug maka isinya boleh sama
        if ($request->item_id != $item->item_id) {
            $rules['item_id'] = 'required|unique:items|max:255';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['price'] = preg_replace('/[^0-9]/', '', $request->price);

        Items::where('id', $item->id)
            ->update($validatedData);

        return redirect('/apps/items')->with('success', 'New item has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $item)
    {
        Items::destroy($item->id);
        return redirect('/apps/items')->with('success', 'Item has been deleted!');
    }
}
