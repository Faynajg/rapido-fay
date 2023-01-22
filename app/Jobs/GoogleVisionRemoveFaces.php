<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use App\Models\Image;

class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $i = Image::find($this->image_id);
        if(!$i){
        return;
    }
    $srcPath = storage_path('/app/public/'.$i->path);
    $image = file_get_contents($srcPath);
    putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credentials.json'));

    $imageAnnotator = new ImageAnnotatorClient();
    // detectar las caras
    $response = $imageAnnotator->faceDetection($image);
    $imageAnnotator->close();
    // recuperar la información de cada cara
    $faces = $response->getFaceAnnotations();
    foreach ($faces as $face) {
    // recuperar los vertices del poligono de la cara
    $vertices = $face->getBoundingPoly()->getVertices();
    $bounds = [];
    // guardar los puntos del poligono de la cara en parejas x,y
    foreach ($vertices as  $vertex) {
    $bounds[] = [$vertex->getX(),$vertex->getY()];
    }
    // calcular altura y anchura
    $w = $bounds[2][0] - $bounds[0][0];
    $h = $bounds[2][1] - $bounds[0][1];
    // cargar la imagen
    $image = SpatieImage::load($srcPath);
    // modificar la imagen con Spatie Image
    $image->watermark(base_path('resources/images/steve.png'))
    ->watermarkPosition('top-left')
    ->watermarkPadding($bounds[0][0],$bounds[0][1])
    ->watermarkWidth($w,Manipulations::UNIT_PIXELS)
    ->watermarkHeight($h,Manipulations::UNIT_PIXELS)
    ->watermarkFit(Manipulations::FIT_STRETCH);
    $image->save($srcPath);
    }
    }
}