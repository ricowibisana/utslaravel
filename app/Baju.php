<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jenis;

class Baju extends Model
{
    public $table = 'baju';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','jenis','harga','foto'];

    public function jenis(){
    	return $this->belongsTo('App\Jenis', 'jenis','id_jenis');
    }
}
