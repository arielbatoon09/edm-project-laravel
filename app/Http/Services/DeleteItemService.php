<?php

namespace App\Http\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Inventory;

class DeleteItemService
{
    public static function DeleteItem(Request $request)
    {
        try {
            $item = Inventory::findOrFail($request->id);   
            $item->delete();

            return response()->json([
                'source' => 'success',
                'message' => 'Deleted item data.',
            ]);

        } catch (Throwable $e) {
            return 'Error Catch: ' . $e->getMessage();
        }
    }
}