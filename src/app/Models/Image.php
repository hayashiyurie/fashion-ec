<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory, Notifiable;
    protected $table = "images";

    // @var array<int, string>
    protected $fillable = [
        'path'
    ];

    protected $guarded = [
        'signup_at',
        'updated_at',
        'deleted_at'
    ];

    // asset('products/cort.png');

    protected $appends = ['path_url'];

    public function getPathUrlAttribute()
    {
        $fileUrl = Storage::disk('public')->url($this->path);

        return $fileUrl;
        // $path->append('file_url')->toArray();
    }
}
