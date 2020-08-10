<?php


namespace App\Actions\Ad;


use App\Models\Ad;

final class IncrementViews
{
    /**
     * Добавляем просмотр баннеру
     *
     * @param Ad $ad
     * @return Ad
     */
    public function execute(Ad $ad): Ad
    {
        $ad->increment('views');
        $ad->save();

        return $ad;
    }
}
