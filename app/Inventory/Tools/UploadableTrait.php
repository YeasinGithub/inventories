<?php

namespace App\Inventory\Tools;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait UploadableTrait
{
    /**
     * Upload a single file in the server
     *
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne($filename, $folder = null )
    {
         $disk = 'public';
        $name = !is_null($filename) ? $filename->getClientOriginalName() : str::random(25);

        return $filename->storeAs(
            $folder,
            $name,
            $disk
        );
    }

    /**
     * @param UploadedFile $file
     *
     * @param string $folder
     * @param string $disk
     *
     * @return false|string
     */
    public function storeFile(UploadedFile $file, $folder = 'products', $disk = 'public')
    {
        return $file->store($folder, ['disk' => $disk]);
    }
}
