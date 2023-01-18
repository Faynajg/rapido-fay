<?php

namespace App\Jobs;
use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Queue\SerializesModels;

class GoogleVisionLabelImage implements ShouldQueue
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
        $this->image_id=$image_id;
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
          $image = file_get_contents(storage_path('/app/public'.$i->path));
           putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credentials.json')); 
           $imageAnnotator = new ImageAnnotatorClient();
            $response = $imageAnnotator->labelDetection($image);
             $imageAnnotator->close();
              $labels = $response->getLabelAnnotations();
               if($labels) { 
                $result = []; 
                foreach ($labels as $label) {
                     $result[]=$label->getDescription(); 
                    } 
                } 
                $i->labels = $result;
                $i->save(); 
                dd(gettype(Image::find($i->id)->labels));

    }
}
