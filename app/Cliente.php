<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'email', 'endereco'];

    public function telefones()
    {
        return $this->hasMany('App\Telefone');
    }

    public function addTelefone(Telefone $telefone)
    {
        return $this->telefones()->save($telefone);
    }

    public function deletarTelefones()
    {
        foreach($this->telefones as $telefone) {
            $telefone->delete();
        }

        return true;
    }
}
