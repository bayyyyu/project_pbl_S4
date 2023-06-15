<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $fillable = ['event_id', 'file', 'deskripsi'];

    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto_dokumentasi')) {
            $foto_dokumentasi = request()->file('foto_dokumentasi');
            $destination = "images/Dokumentasi Event";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto_dokumentasi->extension();
            $url = $foto_dokumentasi->storeAs($destination, $filename);
            $this->foto_dokumentasi = "" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto_dokumentasi = $this->foto_dokumentasi;
        if ($foto_dokumentasi) {
            $path = public_path($foto_dokumentasi);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
}
