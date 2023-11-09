<?php

namespace App\Http\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Inventory;

class UpdateItemService
{
    public static function UpdateItem(Request $request)
    {
        try {
            $item = Inventory::findOrFail($request->id);            
            $item->item_name = $request->item_name;
            $item->item_description = $request->item_description;
            $item->stocks = $request->stocks;
            $item->price = $request->price;
            $item->save();

            return response()->json([
                'source' => 'success',
                'message' => 'Updated item data.',
            ]);


        } catch (Throwable $e) {
            return 'Error Catch: ' . $e->getMessage();
        }
    }
}