<?php

namespace Diary;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    // Table Name
   	protected $table = 'address_book';

   	// Primary Key
   	public $primaryKey = 'id';
}
