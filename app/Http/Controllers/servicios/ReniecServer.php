<?php

namespace App\Http\Controllers\servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReniecServer extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($dni)
    {
        //$url = 'https://mdp.trabajo.gob.pe/formdp/api/ext/persona/'.$dni;
        $url = 'https://sistemas.devida.gob.pe/mesadepartesvirtual/reniec/consultadni/'.$dni;
        return Http::get($url)->json();
    }
}
