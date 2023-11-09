<?php

namespace App\Http\Services;

use Throwable;
use App\Models\Inventory;

class GetAllItemService
{
    public static function GetAllItem()
    {
        try {
            $item = new Inventory();

            return response()->json([
                'source' => 'success',
                'data' => $item->get(),
            ]);
        } catch (Throwable $e) {
            return 'Error Catch: ' . $e->getMessage();
        }
    }
}