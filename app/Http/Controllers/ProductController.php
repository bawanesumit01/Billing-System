<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // LIST ALL PRODUCTS
   public function index()
{
    $products = DB::table('products')->get();
    $stores = DB::table('stores')->pluck('name', 'id'); // [id => name]

    foreach ($products as $p) {
        $storeIds = json_decode($p->store_id, true) ?? [];

        $storeNames = [];
        foreach ($storeIds as $id) {
            if (isset($stores[$id])) {
                $storeNames[] = $stores[$id];
            }
        }

        $p->store_names = implode(', ', $storeNames); // ðŸ‘ˆ add new field
    }

    return view('products.index', compact('products'));
}

    // SHOW ADD FORM
    public function create()
    {
        $stores = DB::table('stores')->orderBy('name')->get();
        return view('products.create', compact('stores'));
    }

    // SAVE NEW PRODUCT
    public function store(Request $request)
    {
        $request->validate([
            'store_id'     => 'required|exists:stores,id',
            'product_code' => 'required|string|max:100',
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'gst_rate'     => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
        ]);

        DB::table('products')->insert([
            'store_id'     =>json_encode($request->store_id),
            'product_code' => trim($request->product_code),
            'name'         => trim($request->name),
            'unit'        => $request->unit,
            'price'        => $request->price,
            'discount_price'        => $request->discount_price,
            'gst_rate'     => $request->gst_rate,
            'stock'        => $request->stock,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product added successfully!');
    }

    // SHOW EDIT FORM
   public function edit($id)
{
    $product = DB::table('products')->where('id', $id)->first();

    if (!$product) {
        return redirect()->route('products.index')
                         ->with('error', 'Product not found!');
    }

    // ðŸ‘‡ decode JSON to array
    $product->store_id = json_decode($product->store_id, true) ?? [];

    $stores = DB::table('stores')->orderBy('name')->get();

    return view('products.edit', compact('product', 'stores'));
}

    // UPDATE PRODUCT
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id'     => 'required|exists:stores,id',
            'product_code' => 'required|string|max:100',
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'gst_rate'     => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
        ]);

        DB::table('products')->where('id', $id)->update([
            'store_id'       => json_encode($request->store_id),
            'product_code'   => trim($request->product_code),
            'name'           => trim($request->name),
            'unit'           => $request->unit,
            'price'          => $request->price,
            'discount_price' => $request->discount_price,
            'gst_rate'       => $request->gst_rate,
            'stock'          => $request->stock,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully!');
    }

    // DELETE PRODUCT
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully!');
    }

    // EXPORT CSV
    public function exportCsv()
    {
        $products = DB::table('products as p')
            ->join('stores as s', 's.id', '=', 'p.store_id')
            ->select('p.*', 's.name as store_name')
            ->orderBy('s.name')
            ->get();

        $filename = 'products_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($products) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['#', 'Store', 'Code', 'Product Name', 'Price (â‚¹)', 'GST%', 'Stock']);
            foreach ($products as $i => $p) {
                fputcsv($handle, [
                    $i + 1,
                    $p->store_name,
                    $p->product_code,
                    $p->name,
                    number_format($p->price, 2),
                    number_format($p->gst_rate, 2),
                    $p->stock,
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}