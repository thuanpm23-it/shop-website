<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'image',
        'shortDesc',
        'longDesc',

    ];
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getTitle()
    {
        return $this->attributes['title'];
    }
    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {

        $this->attributes['image'] = $image;
    }
    public function getShortDesc()
    {
        return $this->attributes['shortDesc'];
    }
    public function setShortDesc($shortDesc)
    {

        $this->attributes['shortDesc'] = $shortDesc;
    }
    public function getLongDesc()
    {
        return $this->attributes['longDesc'];
    }
    public function setLongDesc($longDesc)
    {

        $this->attributes['longDesc'] = $longDesc;
    }
}
