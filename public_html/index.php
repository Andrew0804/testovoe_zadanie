<?php
require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

$mysqli = new mysqli("localhost", "cp20720_testovoe", "YYYF20VF", "cp20720_testovoe");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

// Define routes
$app->get('/', function () use ($app, $mysqli) {
    // Render index view
    $all_goods_sql = "SELECT catalog.name AS name, catalog.price AS price, size.name AS size, stuffing.name AS stuffing, target.name AS target, paste.name AS paste, oven.name AS oven FROM catalog, size, stuffing, target, paste, oven WHERE catalog.size = size.id AND catalog.stuffing = stuffing.id AND catalog.target = target.id AND catalog.paste = paste.id AND catalog.oven = oven.id";
    $all_goods_res = $mysqli->query($all_goods_sql);
    $goods = $all_goods_res->fetch_all(MYSQLI_ASSOC);

    $filter_sql = "SELECT * FROM size";
    $filter_res = $mysqli->query($filter_sql);
    $filter = $filter_res->fetch_all(MYSQLI_ASSOC);

    $goods_count = sizeof($goods);

    $app->render('index.html', compact('goods', 'filter', 'goods_count', 'args', 'args_as_string'));
});

$app->get('/:args+', function ($args) use ($app, $mysqli) {
    // Render index view
    switch (sizeof($args)) {
        case 1:
            $additional = " AND size.slug = '{$args[0]}'";
            $args_as_string = implode('/', $args) . '/';
            $filter_sql = "SELECT * FROM stuffing";
            break;
        case 2:
            $additional = " AND size.slug = '{$args[0]}' AND stuffing.slug = '{$args[1]}'";
            $args_as_string = implode('/', $args) . '/';
            $filter_sql = "SELECT * FROM target";
            break;
        case 3:
            $additional = " AND size.slug = '{$args[0]}' AND stuffing.slug = '{$args[1]}' AND target.slug = '{$args[2]}'";
            $args_as_string = implode('/', $args) . '/';
            $filter_sql = "SELECT * FROM paste";
            break;
        case 4:
            $additional = " AND size.slug = '{$args[0]}' AND stuffing.slug = '{$args[1]}' AND target.slug = '{$args[2]}' AND paste.slug = '{$args[3]}'";
            $args_as_string = implode('/', $args) . '/';
            $filter_sql = "SELECT * FROM oven";
            break;
        case 5:
            $additional = " AND size.slug = '{$args[0]}' AND stuffing.slug = '{$args[1]}' AND target.slug = '{$args[2]}' AND paste.slug = '{$args[3]}' AND oven.slug = '{$args[4]}'";
            $args_as_string = "";
            $filter_sql = "SELECT * FROM size";
            break;
        default:
            $additional = "";
            $args_as_string = "";
            $filter_sql = "SELECT * FROM size";
            break;
    }

    $all_goods_sql = "SELECT catalog.name AS name, catalog.price AS price, size.name AS size, stuffing.name AS stuffing, target.name AS target, paste.name AS paste, oven.name AS oven FROM catalog, size, stuffing, target, paste, oven WHERE catalog.size = size.id AND catalog.stuffing = stuffing.id AND catalog.target = target.id AND catalog.paste = paste.id AND catalog.oven = oven.id" . $additional;
    $all_goods_res = $mysqli->query($all_goods_sql);
    $goods = $all_goods_res->fetch_all(MYSQLI_ASSOC);
    
    $filter_res = $mysqli->query($filter_sql);
    $filter = $filter_res->fetch_all(MYSQLI_ASSOC);

    $goods_count = sizeof($goods);

    $app->render('index.html', compact('goods', 'filter', 'goods_count', 'args', 'args_as_string'));
});

// Run app
$app->run();
