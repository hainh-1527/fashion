<?php

namespace App\Helpers;

use File;


trait Image
{
    /**
     * @param $file
     * @return mixed
     */
    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . str_random(30)) . str_random(2) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }

    /**
     * @param $url
     */
    public function deleteFile($url)
    {
        File::delete($url);
    }
}