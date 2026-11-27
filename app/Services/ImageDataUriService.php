<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use RuntimeException;

class ImageDataUriService
{
    private const MAX_WIDTH = 1080;

    private const QUALITY = 78;

    public function encode(UploadedFile $file): string
    {
        if (! extension_loaded('gd')) {
            throw new RuntimeException('The GD extension is required to process event images.');
        }

        $path = $file->getRealPath();
        $contents = $path === false ? false : file_get_contents($path);

        if ($contents === false) {
            throw new RuntimeException('The uploaded event image could not be read.');
        }

        $source = imagecreatefromstring($contents);

        if ($source === false) {
            throw new RuntimeException('The uploaded event image could not be decoded.');
        }

        $resized = null;
        $jpegCanvas = null;

        try {
            $sourceWidth = imagesx($source);
            $sourceHeight = imagesy($source);
            $width = min($sourceWidth, self::MAX_WIDTH);
            $height = max(1, (int) round($sourceHeight * $width / $sourceWidth));

            $resized = imagecreatetruecolor($width, $height);

            if ($resized === false) {
                throw new RuntimeException('The resized event image could not be created.');
            }

            imagealphablending($resized, false);
            imagesavealpha($resized, true);
            $transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
            imagefill($resized, 0, 0, $transparent);

            if (! imagecopyresampled($resized, $source, 0, 0, 0, 0, $width, $height, $sourceWidth, $sourceHeight)) {
                throw new RuntimeException('The uploaded event image could not be resized.');
            }

            $mime = 'image/webp';
            $output = $resized;

            if (! function_exists('imagewebp')) {
                if (! function_exists('imagejpeg')) {
                    throw new RuntimeException('GD must support WebP or JPEG to encode event images.');
                }

                $jpegCanvas = imagecreatetruecolor($width, $height);

                if ($jpegCanvas === false) {
                    throw new RuntimeException('The JPEG event image could not be created.');
                }

                $white = imagecolorallocate($jpegCanvas, 255, 255, 255);
                imagefill($jpegCanvas, 0, 0, $white);
                imagecopy($jpegCanvas, $resized, 0, 0, 0, 0, $width, $height);
                $output = $jpegCanvas;
                $mime = 'image/jpeg';
            }

            ob_start();
            try {
                $encodedSuccessfully = $mime === 'image/webp'
                    ? imagewebp($output, null, self::QUALITY)
                    : imagejpeg($output, null, self::QUALITY);
                $base64 = ob_get_contents();
            } finally {
                ob_end_clean();
            }

            if (! $encodedSuccessfully || $base64 === false || $base64 === '') {
                throw new RuntimeException('The uploaded event image could not be encoded.');
            }

            return "data:{$mime};base64,".base64_encode($base64);
        } finally {
            if ($jpegCanvas !== null && $jpegCanvas !== false) {
                imagedestroy($jpegCanvas);
            }

            if ($resized !== null && $resized !== false) {
                imagedestroy($resized);
            }

            imagedestroy($source);
        }
    }
}
