<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planotajs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['task_name', 'end_date'];
}
?>