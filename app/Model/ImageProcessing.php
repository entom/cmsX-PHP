<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 29.10.2016
 * Time: 14:41
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Image;

/**
 * Class ImageProcessing
 * @package App
 */
class ImageProcessing extends BaseModel
{

    /**
     * prepareFileName method
     *
     * @param $file
     * @return string
     */
    public static function prepareFileName($file)
    {
        return time() . '.' . $file->getClientOriginalExtension();
    }

    /**
     * transferOriginal method
     *
     * @param $file
     * @param $fileName
     * @param $moduleName
     */
    public static function transferOriginal($file, $fileName, $moduleName)
    {

    }

    /**
     * checkAndCreateModuleFileDirectory method
     *
     * @param $moduleName
     */
    public static function checkAndCreateModuleFileDirectory($moduleName) {
        $dir = public_path('files');
        $directories = ['original', 'thumb'];
        foreach ($directories as $directory) {
            if (!is_dir($dir . '/' . $directory . '/' . $moduleName)) {
                mkdir($dir . '/' . $directory . '/' . $moduleName, 0777, true);
            }    
        }
    }

    /**
     * transferThumbs method
     *
     * @param $file
     * @param $moduleName
     * @param array $sizes
     * @param $oldFileName
     * @return string
     */
    public static function transferThumbs($file, $moduleName, $sizes = array(), $oldFileName = NULL)
    {
        self::checkAndCreateModuleFileDirectory($moduleName);
        $fileName = self::prepareFileName($file);

        if($oldFileName != NULL)
        {
            self::removeFromFiles($oldFileName, $moduleName, $sizes);
        }

        $destinationPath = public_path('files');

        foreach ($sizes as $size)
        {
            $img = Image::make($file->getRealPath());

            $w = $size['w'];
            $h = $size['h'];
            $type = $size['type'];

            $thumbFileName = $w . 'x' . $h . '_' . $fileName;

            switch ($type)
            {
                case 'resize':
                    $img->resize($w == 0 ? null : $w, $h == 0 ? null : $h, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath . '/' . 'thumb' . '/' . $moduleName . '/' . $thumbFileName, 100);
                    break;
                case 'fit':
                    $img->fit($w == 0 ? null : $w, $h == 0 ? null : $h, function ($constraint) {
                        $constraint->upsize();
                    })->save($destinationPath . '/' . 'thumb' . '/' . $moduleName . '/' . $thumbFileName, 100);
                    break;
            }
        }

        $destinationPath = public_path('files');
        $file->move($destinationPath . '/' . 'original' . '/' . $moduleName, $fileName);

        return $fileName;
    }

    /**
     * removeFromFiles method
     *
     * @param $fileName
     * @param $moduleName
     * @param array $sizes
     */
    public static function removeFromFiles($fileName, $moduleName, $sizes = array())
    {
        $dir = public_path('files');
        foreach ($sizes as $size)
        {
            $w = $size['w'];
            $h = $size['h'];

            if(file_exists($dir . '/thumb/' . $moduleName . '/' . $w . 'x' . $h . '_' . $fileName)) {
                unlink($dir . '/thumb/' . $moduleName . '/' . $w . 'x' . $h . '_' . $fileName);
            }
        }

        if(file_exists($dir . '/original/' . $moduleName . '/' . $fileName)) {
            unlink($dir . '/original/' . $moduleName . '/' . $fileName);
        }
    }

    /**
     * getFileExt method
     * @param null|string $fileName
     * @return string
     */
    public static function getFileExt($fileName = NULL)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $extension;
    }

}