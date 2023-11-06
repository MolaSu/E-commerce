<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['CategoryName','CategoryCode'];
    public $timestamps = false;
    protected $table = 'category';
    static function remove(int $id){
        return self::where('CategoryId',$id)->delete();
    }
    static function find(int $id){
        return self::where('CategoryId',$id)->first();
    }
    static function edit(int $id, $arr){
        return self::where('CategoryId',$id)->update($arr);
    }
}
