<?php

namespace App\Http\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Inventory;

class AddNewItemService
{
    private static $isEmpty;
    public static function AddNewItem(Request $request)
    {
        self::ValidatePost($request);

        if (!self::$isEmpty) {

            self::StoreItem($request);

            return response()->json([
                'source' => 'success',
                'message' => 'Successfully added item.',
                'data' => Inventory::all(),
            ]);

        } else {
            return response()->json([
                'source' => 'error',
                'message' => 'Empty fields!',
            ]);
        }
    }
    private static function StoreItem(Request $request)
    {
        try {
            $inventory = new Inventory();
            $inventory->item_name = $request->item_name;
            $inventory->item_description = $request->item_description;
            $inventory->stocks = $request->stocks;
            $inventory->price = $request->price;
            $inventory->save();

        } catch (Throwable $e) {
            return 'Error Catch: ' . $e->getMessage();
        }
    }

    private static function ValidatePost(Request $request)
    {
        try {
            if (!empty($request->item_name) && !empty($request->item_description) && !empty($request->stocks) && !empty($request->price)) {
                return self::$isEmpty = false;
            }

            return self::$isEmpty = true;

        } catch (Throwable $e) {
            return 'Error Catch: ' . $e->getMessage();
        }
    }
}