<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";
    date_default_timezone_set('America/Los_Angeles');

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=stylists_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
      return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });


    $app->post("/", function() use ($app) {
        $new_Stylist = new Stylist($_POST['name'], $_POST['date_began'], $_POST['specialty']);
        $new_Stylist->save();
      return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylist/{id}", function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        $found_clients  = $found_stylist->getClients($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $found_stylist, 'clients' => $found_clients));
    });

    return $app;
?>
