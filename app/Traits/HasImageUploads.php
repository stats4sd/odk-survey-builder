<?php

namespace App\Traits;

use App\Helpers\GenericHelper;
use Illuminate\Support\Facades\Storage;

trait HasImageUploads
{

    public function setAttribute ($key, $value)
    {

        if(in_array($key, $this->images)) {

            $disk = "public";
            $request = \Request::instance();
            $destination_path =  $this->uploadPath;
            $attribute_value = $this->{$key};

            /// *****************************************************
            // DELETE FILES IF NEEDED
            // *****************************************************
            if($value == null) {
                Storage::disk($disk)->delete($this->{$key});
                $this->attributes[$key] = null;
            }

            /// *****************************************************
            // Handle Images
            //  - 'Image' field types with crop send a base64 string instead of the actual image file, as the image gets edited before hitting this method.
            // *****************************************************
            if(starts_with($value, 'data:image')) {
                $image = \Image::make($value)->encode('png', 90);
                $filename = md5($value.time()).'.png';
                Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

                $this->attributes[$key] = $destination_path.'/'.$filename;
            }

            return;
        }

        return parent::setAttribute($key, $value);
    }
}