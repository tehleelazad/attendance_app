<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class leavemodel extends Model
{
    use HasFactory;
    protected $table = 'leave';
    protected $fillable = [
        'description',
        'leavetype',
        'is_approved',
        'userprofile_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}