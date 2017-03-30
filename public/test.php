<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

setlocale(LC_ALL, 'pl_PL');
date_default_timezone_set('Europe/Warsaw');

require __DIR__.'/../bootstrap/autoload.php';

$path = __DIR__ . '/../tests';

$fullPath = $_GET['dir'];
$jsons = null;

if(isset($fullPath) && !empty($fullPath))
{
    $result = `../vendor/bin/phpunit $fullPath --log-json ../storage/logs/test.json --no-configuration --debug`;

    $fileContent = file_get_contents('../storage/logs/test.json');

    $contents = explode('}{', $fileContent);
    $jsons = [];

    foreach ($contents as $key => $content)
    {
        if($key > 0) $content = '{' . $content;
        if($key+1 < count($contents)) $content .= '}';
        $json = json_decode($content);
        $jsons[] = $json;
    }
}

function recursiveDir($path)
{
    echo '<ul>';
    $dh  = opendir($path);
    while (false !== ($filename = readdir($dh))) {
        if($filename != '.' && $filename != '..')
        {
            echo '<li>';
            if(is_dir($path.'/'.$filename)) {
                echo '<a href="#"><i class="fa fa-folder-open"></i>' . $filename . '</a>';
                $files[$filename] = recursiveDir($path.'/'.$filename);
                echo '</li>';
                echo '</ul>';
            } else {
                echo '<a href="/test.php?dir='.$path.'/'.$filename.'">';
                echo '<i class="fa fa-file"></i>' . $filename;
                $files[] = $filename;
                echo '</a>';
                echo '</li>';
            }
        }
    }
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHPunit Testing</title>
    <link rel="stylesheet" href="/dashboard/node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="/dashboard/node_modules/animate.css/animate.min.css" />
    <link rel="stylesheet" href="/dashboard/css/style.css" type="text/css">
    <link rel="stylesheet" href="/dashboard/css/custom.css" type="text/css">
    <link rel="stylesheet" href="/dashboard/bower_components/font-awesome-animation/dist/font-awesome-animation.min.css">

    <style>
        .navigation-list ul i {
            margin-right: 5px;
        }
        .navigation-list ul > li > ul {
            margin-left: 20px;
        }
        .navigation-list li a {
            display: block;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<nav class="blue-grey" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">PhpUnit GUI by TomaszNicieja</a>
        <ul class="right hide-on-med-and-down">
            <li><a class="white-text" href="#"><?php echo `../vendor/bin/phpunit --version`; ?></a></li>
        </ul>
    </div>
</nav>

    <div class="section">
        <div class="row">
            <div class="col s3 navigation-list">
                <?php echo recursiveDir($path); ?>
            </div>

            <div class="col s9">
                <?php if($jsons != NULL) : ?>
                    <h3>Testing: <?php echo $jsons[0]->suite; ?></h3>

                    <?php for($i=1; $i<count($jsons); $i++) : $json = $jsons[$i]; ?>
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card blue-grey darken-1">
                                    <div class="card-content white-text">
                                        <span class="card-title">
                                            <?php echo $json->test; ?>
                                        </span>
                                        <?php $i++; $json = $jsons[$i]; ?>
                                        <div><b>Status: </b><span class="<?php echo $json->status == 'pass' ? 'green-text' : 'red-text'; ?>"><?php echo $json->status; ?></span></div>
                                        <div><b>Time: </b><?php echo $json->time; ?></div>
                                        <div><b>Method: </b><?php echo explode($json->suite.'::', $json->test)[1]; ?></div>

                                        <?php if(!empty($json->trace)) : ?>
                                            <h4>Stack trace:</h4>
                                            <div class="trace">
                                                <h5><?php echo $json->message; ?></h5>
                                                <?php foreach ($json->trace as $trace_key => $trace) : ?>
                                                    <code><b>file</b>: <?php echo $trace->file; ?></code><br />
                                                    <code><b>line</b>: <?php echo $trace->line; ?></code><br />
                                                    <?php if(isset($trace->function)) : ?>
                                                        <code><b>function</b>: <?php echo $trace->function; ?></code><br />
                                                    <?php endif; ?>
                                                    <?php if(isset($trace->class)) : ?>
                                                        <code><b>class</b>: <?php echo $trace->class; ?></code><br />
                                                    <?php endif; ?>
                                                    <?php if(isset($trace->type)) : ?>
                                                        <code><b>type</b>: <?php echo $trace->type; ?></code><br />
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="card-action">

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else : ?>
                    <h3>Please select file for testing.</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>


