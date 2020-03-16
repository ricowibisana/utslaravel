<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
	public $table = "jenis";
	protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_jenis'];

}
