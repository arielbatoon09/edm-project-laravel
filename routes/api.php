<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/get-items', [InventoryController::class, 'GetAllItem']);
Route::post('/add-item', [InventoryController::class, 'AddNewItem']);
Route::post('/update-item', [InventoryController::class, 'UpdateItem']);
Route::post('/delete-item', [InventoryController::class, 'DeleteItem']);
