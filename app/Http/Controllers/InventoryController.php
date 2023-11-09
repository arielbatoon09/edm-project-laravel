<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\GetAllItemService;
use App\Http\Services\AddNewItemService;
use App\Http\Services\UpdateItemService;
use App\Http\Services\DeleteItemService;

class InventoryController extends Controller
{
    public function GetAllItem()
    {
        return GetAllItemService::GetAllItem();
    }
    public function AddNewItem(Request $request)
    {
        return AddNewItemService::AddNewItem($request);
    }
    public function UpdateItem(Request $request)
    {
        return UpdateItemService::UpdateItem($request);
    }
    public function DeleteItem(Request $request)
    {
        return DeleteItemService::DeleteItem($request);
    }
}
