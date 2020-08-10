<?php

namespace App\Http\Controllers\Api;

use App\Actions\Ad\CreateAd;
use App\Actions\Ad\IncrementViews;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdCreateRequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use Illuminate\Http\JsonResponse;

class AdController extends Controller
{
    /**
     * Получаем самый дорогой неоткрученный баннер
     *
     * @param IncrementViews $action
     * @return JsonResponse
     */
    public function get(IncrementViews $action): JsonResponse
    {
        $ad = Ad::active()->orderByDesc('price')->firstOrFail();

        $action->execute($ad);

        return (new AdResource($ad))->response()->setStatusCode(200);
    }

    /**
     * Сохраняем новый баннер
     *
     * @param AdCreateRequest $request
     * @param CreateAd $action
     * @return JsonResponse|object
     */
    public function create(AdCreateRequest $request, CreateAd $action): JsonResponse
    {
        $ad = $action->execute($request);

        return (new AdResource($ad))->response()->setStatusCode(201);
    }
}
