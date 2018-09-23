<?php 

// include("vendor/autoload.php");

// use ElephantIO\Client;
// use ElephantIO\Engine\SocketIO\Version1X;




// $client = new Client(new Version1X('http://localhost:3001'));
// $client->initialize();
// $client->emit("new_order",["test"=>"test","test1"=>"test1"]);
// $client->close();

error_reporting(E_ALL);
ini_set('display_errors','On');

    use ElephantIO\Client,
        ElephantIO\Engine\SocketIO\Version2X,
        ElephantIO\Exception\ServerConnectionFailureException;

    require __DIR__ . '/vendor/autoload.php';

    $client = new Client(new Version2X('http://localhost:3001'));

    try
    {
        $client->initialize();
        $client->emit("new_order",["test"=>"test","test1"=>"test1"]);
        $client->close();
    }
    catch (ServerConnectionFailureException $e)
    {
        echo $e;
    }