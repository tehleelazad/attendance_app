<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $fillable = ['title'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public static function rules()
    {
        return [
            'title' => 'required|unique:role,title'
        ];
    }

}