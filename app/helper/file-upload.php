<?php

use Intervention\Image\Facades\Image as Image;

function imageUpload ($image, $imageDirectory, $imageNameString = null, $width = null, $height = null, $modelFileUrl = null)
{
    if ($image)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $imageName = (isset($imageNameString) ? $imageNameString : '').'-'.time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        $imageUrl = 'backend/assets/uploaded-files/'.$imageDirectory.$imageName;
        if ($image->getClientOriginalExtension() == 'ico')
        {
            $image->move($imageDirectory, $imageName);
        } else {
            Image::make($image)->resize((isset($width) ? $width : ''), (isset($height) ? $height : ''))->encode('jpeg',80)->save($imageUrl);
        }
    } else {
        $imageUrl = $modelFileUrl;
    }
    return $imageUrl;
}

function fileUploadHelper ($fileObject, $directory, $nameString = null)
{
    if ($fileObject)
    {
        $fileName       = str_replace(' ', '-', $fileObject->getClientOriginalName()).'~'.rand(100,100000).'.'.$fileObject->extension();
        $fileDirectory  = 'backend/assets/uploaded-files/'.$directory;
        $fileObject->move($fileDirectory, $fileName);
        return $fileDirectory.$fileName;
    } else {
        return null;
    }
}

function getFileSize($file)
{
    return $file->getSize();
}
function getFileExtension($file)
{
    return $file->extension();
}
function getFileType($file)
{
    return $file->getMimeType();
}
