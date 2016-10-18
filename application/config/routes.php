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

//ROUTES TARIFAS
$route['tarifas'] = 'TariffsController';
$route['nova-tarifa'] = 'TariffsController/newTariff';

//ROUTES DE CARACTERISTICAS
$route['caracteristicas'] = 'FeaturesController';
$route['nova-caracteristica'] = 'FeaturesController/newFeature';
$route['deletar-caracteristica'] = 'FeaturesController/deleteFeature';

//ROUTES DE LOGIN
$route['login'] = 'LoginController/login';
$route['sair'] = 'LoginController/logOut';