<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\Deity;
use App\Models\FortuneCategory;
use App\Models\Fortune;
// Resource
use App\Http\Resources\Api\FortuneCategoryResource;
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

    // 帶變數拉主神資料庫資料再拉詩籤流派關聯資表
    public function category(Request $request)
    {
        $slug = $request->query('slug', 'guanyin');

        $Deity = Deity::with([
            'fortuneCategory' => function ($query) {
                $query->orderBy('id', 'asc');
            }
        ])
        ->where('slug', $slug)
        ->first();

        if (!$Deity) {
            return response()->json([
                'message' => '找不到主神'
            ], 404);
        }

        $resource = FortuneCategoryResource::collection(
            $Deity->fortuneCategory
        );

        return response()->json([
            'main_god' => $Deity->name,
            'raw_count' => $Deity->fortuneCategory->count(),
            'resource_data' => $resource,
        ]);
    }

    public function drawLot(Request $request)
    {
        // 1. 驗證請求是否有 system_id
        $request->validate([
            'category_id' => 'required|integer',
        ]);

        // 2. 隨機撈取一筆該系統的籤詩
        $lot = Fortune::where('fortune_category_id', $request->category_id)
                    ->inRandomOrder()
                    ->first();

        // 3. 處理找不到的情況 (防呆機制)
        if (!$lot) {
            return response()->json(['message' => '找不到該系統的籤詩'], 404);
        }

        // 4. 使用 Resource 回傳
        return new FortuneResource($lot);
    }
}
