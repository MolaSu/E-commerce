<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public $timestamps = false;

    protected $fillable = ['ProductName','CategoryId','ProductCode','Unit','Specification','ImageUrl','UnitOfPrice','Description','CreatedDate','UpdatedDate'];

    static function edit(int $id, $arr){
        return self::where('ProductId',$id)->update($arr);
    }
}
