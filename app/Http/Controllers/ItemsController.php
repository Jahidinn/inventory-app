<?php

namespace App\Http\Controllers;

use App\Exports\ItemssExport;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;

        return view('apps.items.index', [
            'items' => Items::where('name', 'LIKE', '%' . $keyword . '%')
                ->whereHas('category', function ($query) use ($category_id) {
                    return $query->where('category_id', 'LIKE', '%' . $category_id . '%');
                })
                ->paginate(5),
            'categories' => Category::all()
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

    public function exportPdf()
    {
        $items = Items::all();
        $pdf = Pdf::loadView('pdf.export-item', ['items' => $items])->setOption(['defaultFont' => 'sans-serif']);
        return $pdf->download('export-item-' . Carbon::now()->timestamp . '.pdf');
    }
    public function exportExcel(Request $request)
    {
        return (new ItemssExport($request->category_id))->download('Items-' . Carbon::now()->timestamp . '.xlsx');
        // return Excel::download(new ItemssExport($request->category_id), 'Items-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function exportPdf2()
    {
        return view('pdf.export-item', [
            'items' => Items::all()
        ]);
    }
}
