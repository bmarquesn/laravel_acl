<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $jquerymask = false;
    public $tablesorter = false;

    public function estados_brasileiros() {
        $estadosBrasileiros = array(
			'AC' => 'Acre',
			'AL' => 'Alagoas',
			'AM' => 'Amazonas',
			'AP' => 'Amapá',
			'BA' => 'Bahia',
			'CE' => 'Ceará',
			'DF' => 'Distrito Federal',
			'ES' => 'Espírito Santo',
			'GO' => 'Goiás',
			'MA' => 'Maranhão',
			'MG' => 'Minas Gerais',
			'MS' => 'Mato Grosso do Sul',
			'MT' => 'Mato Grosso',
			'PA' => 'Pará',
			'PB' => 'Paraíba',
			'PE' => 'Pernambuco',
			'PI' => 'Piauí',
			'PR' => 'Paraná',
			'RJ' => 'Rio de Janeiro',
			'RN' => 'Rio Grande do Norte',
			'RO' => 'Rondônia',
			'RR' => 'Roraima',
			'RS' => 'Rio Grande do Sul',
			'SC' => 'Santa Catarina',
			'SE' => 'Sergipe',
			'SP' => 'São Paulo',
			'TO' => 'Tocantins'
		);

		return $estadosBrasileiros;
    }
}
