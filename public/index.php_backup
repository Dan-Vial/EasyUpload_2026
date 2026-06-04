<?php

require_once '../vendor/autoload.php';

include_once '../src/dotEnv.php';
include_once '../src/log.php';

dotEnv(__DIR__ . '/../');


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


function renderPage(string $view, string $title = ''): void
{
    $title = $title ?: ($_ENV['MAIL_FROM_NAME'] ?? 'Site');

    require __DIR__ . '/../src/_header.php';
    require __DIR__ . '/../src/' . $view;
    require __DIR__ . '/../src/_footer.php';
}

function runScript(string $file): void
{
    require __DIR__ . '/../src/' . $file;
}

switch ($uri) {
    case '/':
        renderPage("accueil.php");
        break;

    case '/upload':
        runScript("upload.php");
        break;

    case '/download/getFile':
        $file = $_GET['file'] ?? null;
        if (!$file) {
            http_response_code(400);
        }
        runScript("Download.php");
        break;

    case '/download/':
        $file = $_GET['file'] ?? null;
        if (!$file) {
            http_response_code(400);
        }
        renderPage("downloadPage.php");
        break;

    case '/login':
        require __DIR__ . '/../src/pageLogin.html';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/404.html';
        break;
}
