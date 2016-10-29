<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'UsersController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//ROUTES QUARTOs
$route['quartos'] = 'RoomsController';
$route['novo-quarto'] = 'RoomsController/newRoom';

//ROUTES TIPOS DE QUARTO
$route['tipos-quartos'] = 'KindsController';
$route['novo-tipo'] = 'KindsController/newKind';
$route['alterar-tipo/(:num)'] = 'KindsController/update/$1';

//ROUTES TARIFAS
$route['tarifas'] = 'TariffsController';
$route['nova-tarifa'] = 'TariffsController/new';
$route['alterar-tarifa/(:num)'] = 'TariffsController/update/$1';
$route['deletar-tarifa/(:num)'] = 'TariffsController/delete/$1';

//ROUTES DE CARACTERISTICAS
$route['caracteristicas'] = 'FeaturesController';
$route['nova-caracteristica'] = 'FeaturesController/newFeature';
$route['deletar-caracteristica/(:num)'] = 'FeaturesController/delete/$1';

//ROUTES DE LOGIN
$route['login'] = 'LoginController/login';
$route['sair'] = 'LoginController/logOut';

//teste
$route['teste'] = 'AvailableRoomsController';
$route['check_date'] = 'AvailableRoomsController/checkDateRoom';