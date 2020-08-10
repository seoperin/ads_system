<?php


namespace App\Actions\Ad;


use App\Http\Requests\AdCreateRequest;
use App\Models\Ad;
use App\Services\ImageUploader;

final class CreateAd
{
    /**
     * @var ImageUploader
     */
    private $imageUploader;

    public function __construct(ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }

    /**
     * Сохраняем баннер
     *
     * @param AdCreateRequest $request
     * @return Ad
     */
    public function execute(AdCreateRequest $request) : Ad
    {
        $banner_path = $this->imageUploader->upload(
            'public/banners',
            $request->file('banner')
        );

        $ad = Ad::create([
            'text' => $request->get('text'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
            'banner' => $banner_path,
        ]);

        return $ad;
    }
}
