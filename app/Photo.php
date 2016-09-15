<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $upload_directory ='/images/';

    protected $fillable = ['file'];



    public function getFileAttribute($photo){

        //
        return $this->upload_directory.$photo;
    }

}
