<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\SignSystem;
use App\Models\Fortune;
// Resource
use App\Http\Resources\Api\SignSystemResource;
use App\Http\Resources\Api\FortuneResource;

class FortuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'msg' => 'test',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function systems()
    {
        // 使用 Eloquent 拉取所有資料
        // 如果資料表內的欄位名稱就是 id 和 name，直接回傳即可
        // $systems = SignSystem::all(['id', 'name']);
        // $systems = SignSystem::orderBy('id', 'asc')->get(['id', 'name']);
        $systems = SignSystem::orderBy('id', 'asc')->get();

        $resource = SignSystemResource::collection($systems);

        return response()->json([
            'raw_count' => $systems->count(), // 如果這裡是 0，代表資料庫沒撈到東西
            'resource_data' => $resource,
        ]);

        // return response()->json($systems);
        // 產生 Resource: php artisan make:resource SignSystemResource
        // return SignSystemResource::collection($systems);

        // return response()->json([
        //     [
        //         'id' => 1,
        //         'name' => '觀音一百籤'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => '雷雨師一百籤'
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => '六十甲子籤'
        //     ]
        // ]);
    }

    public function drawLot(Request $request)
    {
        // 1. 驗證請求是否有 system_id
        $request->validate([
            'system_id' => 'required|integer',
        ]);

        // 2. 隨機撈取一筆該系統的籤詩
        $lot = Fortune::where('sign_system_id', $request->system_id)
                    ->inRandomOrder()
                    ->first();

        // 3. 處理找不到的情況 (防呆機制)
        if (!$lot) {
            return response()->json(['message' => '找不到該系統的籤詩'], 404);
        }

        // 4. 使用 Resource 回傳
        return new FortuneResource($lot);

        $systemId = $request->system_id;

        $lot = [
            'number' => 28,
            'level' => '上上籤',
            'title' => '東邊月上正嬋娟',
            'content' => '功名得意與君顯，前程萬里福綿綿。'
        ];

        return response()->json($lot);
    }
}
