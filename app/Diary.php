<?php

namespace Diary;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    // Table Name
   	protected $table = 'diary';

   	// Primary Key
   	public $primaryKey = 'id';
}
