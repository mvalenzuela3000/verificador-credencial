<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VCredencial extends Model
{
    protected $table = 'rrhh.v_credenciales';
    public $timestamps = false;

    public function getNombreCompletoAttribute(){
        $nombre="{$this->nombres} {$this->ap_paterno} {$this->ap_materno}";
        if($this->ap_casada){
            $nombre.=" de ".$this->ap_casada;
        }
        return trim($nombre);
    }
}
