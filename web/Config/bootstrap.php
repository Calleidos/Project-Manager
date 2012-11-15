<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models', '/next/path/to/models'),
 *     'Model/Behavior'            => array('/path/to/behaviors', '/next/path/to/behaviors'),
 *     'Model/Datasource'          => array('/path/to/datasources', '/next/path/to/datasources'),
 *     'Model/Datasource/Database' => array('/path/to/databases', '/next/path/to/database'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions', '/next/path/to/sessions'),
 *     'Controller'                => array('/path/to/controllers', '/next/path/to/controllers'),
 *     'Controller/Component'      => array('/path/to/components', '/next/path/to/components'),
 *     'Controller/Component/Auth' => array('/path/to/auths', '/next/path/to/auths'),
 *     'Controller/Component/Acl'  => array('/path/to/acls', '/next/path/to/acls'),
 *     'View'                      => array('/path/to/views', '/next/path/to/views'),
 *     'View/Helper'               => array('/path/to/helpers', '/next/path/to/helpers'),
 *     'Console'                   => array('/path/to/consoles', '/next/path/to/consoles'),
 *     'Console/Command'           => array('/path/to/commands', '/next/path/to/commands'),
 *     'Console/Command/Task'      => array('/path/to/tasks', '/next/path/to/tasks'),
 *     'Lib'                       => array('/path/to/libs', '/next/path/to/libs'),
 *     'Locale'                    => array('/path/to/locales', '/next/path/to/locales'),
 *     'Vendor'                    => array('/path/to/vendors', '/next/path/to/vendors'),
 *     'Plugin'                    => array('/path/to/plugins', '/next/path/to/plugins'),
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

CakePlugin::load('Uploader');
CakePlugin::load('TinyMce');

$tipiDiPagamento = array('RiBa 30 D.F. F.M.', 'RiBa 60 D.F. F.M.', 'RiBa 90 D.F. F.M.', 'Bonifico Bancario', 'Carta di Credito', 'Contanti');
$tipiDiPagamento = array_combine($tipiDiPagamento, $tipiDiPagamento);
Configure::write('tipiDiPagamento', $tipiDiPagamento);

$userRoles = array('Project Manager', 'Account Manager', 'Tecnico - Informatica', 'Tecnico - Grafico');
$userRoles = array_combine($userRoles, $userRoles);

Configure::write('userRoles', $userRoles);

$quoteStatus = array(1 => 'Non Preventivato', 2 => 'Parzialmente preventivato', 3 => 'Non Confermato', 4 => 'Confermato' );
$quoteColor= array(1 => 'red', 2 => 'red', 3 => 'yellow', 4 => 'green');

Configure::write('quoteStatus', $quoteStatus);
Configure::write('quoteColor', $quoteColor);

$ddtStatus = array(1 => 'Non consegnato', 2 => 'DDT non confermati', 3 => 'Consegnato');
$ddtColor= array(1 => 'red', 2 => 'yellow', 3 => 'green');

Configure::write('ddtStatus', $ddtStatus);
Configure::write('ddtColor', $ddtColor);

$invoiceStatus = array(1 => 'Non fatturare', 2 => 'Da Fatturare', 3=> 'Parzialmente fatturato', 4 => 'Fatturato');
$invoiceColor= array(1 => 'red', 2 => 'blue', 3 => 'yellow', 4 => 'green');

Configure::write('invoiceStatus', $invoiceStatus);
Configure::write('invoiceColor', $invoiceColor);

$addressType=array("Sede Legale", "Sede Operativa", "Altro indirizzo");
$addressType=array_combine($addressType,$addressType);
Configure::write('addressType', $addressType);

$iva=array("21" => "21", "4"=>"4");
Configure::write('iva', $iva);

$bankDetailTypes=array("Conto Primario (Caricamento Riba)", "Conto Secondario (Anagrafica)" );
$bankDetailTypes = array_combine($bankDetailTypes, $bankDetailTypes);
Configure::write('bankDetailTypes', $bankDetailTypes);

$tipologiaDocumento=array("Conferma Preventivo", "Contratto", "Distinta di Pagamento", "Documento di trasporto esterno", "Fattura Acquisto");
$tipologiaDocumento=array_combine($tipologiaDocumento, $tipologiaDocumento);
Configure::write('tipologiaDocumento', $tipologiaDocumento);

$trasportiDDT=array("Mittente", "Destinatario", "Vettore");
$trasportiDDT=array_combine($trasportiDDT, $trasportiDDT);
Configure::write('trasportiDDT', $trasportiDDT);

$vettori=array("", "New Line Express");
$vettori=array_combine($vettori, $vettori);
Configure::write('vettori', $vettori);

function formatFileName($name, $field, $file) {
	return sha1(strtotime(date("Y-m-d H:i:s")).$name.rand(1, 1000));
}