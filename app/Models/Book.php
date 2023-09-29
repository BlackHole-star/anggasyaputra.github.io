<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $fillable = ['isbn', 'author', 'title', 'price', 'category'];
    public $incrementing = false;
    use HasFactory;
}
