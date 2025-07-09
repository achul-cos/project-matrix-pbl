<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WarnetSetting;

class WarnetController extends Controller
{
   public function index()
   {
    $products = Product::orderBy('floor')->orderBy('code')->get();

    $setting = WarnetSetting::firstOrCreate([], [
            'is_open' => true,
            'available_computers' => [],
        ]);

        return view('pages.admin_management_warnet', [
            'products' => $products,
            'setting' => $setting,
            'checkedProductIds' => $setting->available_computers ?? [],
        ]);
   } 

    public function updateAvailableComputers(Request $request)
    {
        $selected = $request->input('available_computers', []); // yang diceklis

        // ambil semua ID komputer dari database
        $allProductIds = Product::pluck('id')->toArray();

        // simpan data ke setting
        $setting = WarnetSetting::first();
        $setting->available_computers = $selected;
        $setting->save();

        // komputer yg diceklis (available)
        Product::whereIn('id', $selected)->update(['status' => 'available']);

        // komputer yg tidak diceklis (maintenance)
        $notSelected = array_diff($allProductIds, $selected);
        Product::whereIn('id', $notSelected)->update(['status' => 'maintenance']);

        return redirect()->route('admin.management_warnet')->with('success', 'Status komputer berhasil diperbarui.');
    }


    public function updateStatus(Request $request)
    {
        $setting = WarnetSetting::first();
        $setting->is_open = $request->input('is_open') == '1';

        if (!$setting->is_open) {
            $setting->close_message = $request->input('close_message');
        } else {
            $setting->close_message = null;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Status warnet diperbarui.');
    }

}
