<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

final class ImageUploader
{

    /** @var Filesystem */
    private $storage;

    public function __construct(Filesystem $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Сохраняем изображение
     *
     * @param string $folder
     * @param UploadedFile $file
     * @return mixed
     */
    public function upload(string $folder, UploadedFile $file)
    {
        return $this->storage->putFile($folder, $file);
    }

}
