<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;
    
    /**
     @return void 
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->w = $w;
        $this->h = $h;
        $this->path =dirname($filePath);
        $this->fileName = basename($filePath);  
    }

    /**
     * Execute the job.
     @return void
     */
    public function handle()
    {
        $w= $this->w;
        $h= $this->h;
        $srcPath= storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath= storage_path() . '/app/public/'. $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        try {
            Image::load($srcPath)->crop(Manipulations::CROP_CENTER,$w,$h)
            ->watermark(base_path('resources/img/logo.png'))
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkHeight(10, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(10, Manipulations::UNIT_PERCENT)
            ->save($destPath); 
        } catch (\Exception $e) {
                        // Handle any potential exceptions or errors here
                        // You can log the error, return a response, or take appropriate action.
        }

    }


}
