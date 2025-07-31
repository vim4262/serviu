<?php
// Include global configuration
require_once dirname(__DIR__) . '/Config/config.php';

// Include controllers
require_once CONTROLLERS_PATH . '/HomeController.php';
require_once CONTROLLERS_PATH . '/AboutController.php';
require_once CONTROLLERS_PATH . '/ContactController.php';
require_once CONTROLLERS_PATH . '/PublicationController.php';
require_once CONTROLLERS_PATH . '/ServiceController.php';
require_once CONTROLLERS_PATH . '/ReservationController.php';

function cleanParam($param) {
    return htmlspecialchars(trim($param), ENT_QUOTES, 'UTF-8');
}

$page = isset($_GET['page']) ? cleanParam($_GET['page']) : 'home';
$action = isset($_GET['action']) ? cleanParam($_GET['action']) : 'index';
$id = isset($_GET['id']) ? cleanParam($_GET['id']) : null;

try {
    switch ($page) {
        case 'home':
        case '':
            $controller = new HomeController();
            $controller->index();
            break;
        case 'about':
            $controller = new AboutController();
            $controller->index();
            break;
        case 'contact':
            $controller = new ContactController();
            $controller->index();
            break;
        case 'publication':
            $controller = new PublicationController();
            if (isset($_GET['article'])) {
                $controller->show(cleanParam($_GET['article']));
            } else {
                $controller->index();
            }
            break;
        case 'services':
            $controller = new ServiceController();
            if (isset($_GET['service'])) {
                $controller->show(cleanParam($_GET['service']));
            } else {
                $controller->index();
            }
            break;
        case 'reservation':
            $controller = new ReservationController();
            if ($action === 'apiCreate') {
                header('Content-Type: application/json');
                $result = $controller->apiCreate();
                echo json_encode($result);
                exit;
            } elseif ($action === 'success') {
                $data = [
                    'title' => 'Réservation confirmée - Servium',
                    'description' => 'Votre réservation a été confirmée avec succès'
                ];
                require_once VIEWS_PATH . '/reservation/success.php';
            } else {
                $controller->index();
            }
            break;
        default:
            header('HTTP/1.0 404 Not Found');
            $data = [
                'title' => 'Page non trouvée - Servium',
                'description' => 'La page demandée n\'existe pas.'
            ];
            require_once VIEWS_PATH . '/errors/404.php';
            break;
    }
} catch (Exception $e) {
    error_log('Erreur dans le routeur : ' . $e->getMessage());
    header('HTTP/1.0 500 Internal Server Error');
    $data = [
        'title' => 'Erreur serveur - Servium',
        'description' => 'Une erreur est survenue. Veuillez réessayer plus tard.'
    ];
    require_once VIEWS_PATH . '/errors/500.php';
}
?> 