<?php
// ReservationController: handles all reservation actions
require_once dirname(__DIR__) . '/Config/database.php';
require_once dirname(__DIR__) . '/Models/Reservation.php';

class ReservationController {
    private $db;
    private $reservation;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->reservation = new Reservation($this->db);
    }

    // Show reservation form
    public function index() {
        include dirname(__DIR__) . '/Views/reservation/index.php';
    }

    // Handle reservation form submission
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->reservation->nom = $_POST['nom'] ?? '';
            $this->reservation->email = $_POST['email'] ?? '';
            $this->reservation->telephone = $_POST['telephone'] ?? '';
            $this->reservation->pays_depart = $_POST['pays_depart'] ?? '';
            $this->reservation->pays_arrivee = $_POST['pays_arrivee'] ?? '';
            $this->reservation->type_ticket = $_POST['type_ticket'] ?? '';
            $this->reservation->moyen_transport = $_POST['moyen_transport'] ?? '';
            $this->reservation->date_depart = $_POST['date_depart'] ?? '';
            $this->reservation->message = $_POST['message'] ?? '';

            $errors = $this->reservation->validate();

            if (empty($errors)) {
                if ($this->reservation->create()) {
                    $this->sendConfirmationEmail();
                    header('Location: ' . url('reservation', ['action' => 'success']));
                    exit();
                } else {
                    $errors[] = "Erreur lors de la création de la réservation";
                }
            }

            if (!empty($errors)) {
                include dirname(__DIR__) . '/Views/reservation/index.php';
                return;
            }
        }
        header('Location: ' . url('home'));
        exit();
    }

    // List all reservations (for admin)
    public function list() {
        $reservations = $this->reservation->read();
        include dirname(__DIR__) . '/Views/reservation/list.php';
    }

    // Show a specific reservation
    public function show($id) {
        $this->reservation->id = $id;
        if ($this->reservation->readOne()) {
            include dirname(__DIR__) . '/Views/reservation/show.php';
        } else {
            echo "Réservation non trouvée";
        }
    }

    // Update a reservation
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->reservation->id = $id;
            $this->reservation->nom = $_POST['nom'] ?? '';
            $this->reservation->email = $_POST['email'] ?? '';
            $this->reservation->telephone = $_POST['telephone'] ?? '';
            $this->reservation->pays_depart = $_POST['pays_depart'] ?? '';
            $this->reservation->pays_arrivee = $_POST['pays_arrivee'] ?? '';
            $this->reservation->type_ticket = $_POST['type_ticket'] ?? '';
            $this->reservation->moyen_transport = $_POST['moyen_transport'] ?? '';
            $this->reservation->date_depart = $_POST['date_depart'] ?? '';
            $this->reservation->message = $_POST['message'] ?? '';

            $errors = $this->reservation->validate();

            if (empty($errors)) {
                if ($this->reservation->update()) {
                    header('Location: ' . url('reservation', ['action' => 'list']));
                    exit();
                } else {
                    $errors[] = "Erreur lors de la mise à jour";
                }
            }
        } else {
            $this->reservation->id = $id;
            $this->reservation->readOne();
        }
        include dirname(__DIR__) . '/Views/reservation/edit.php';
    }

    // Delete a reservation
    public function delete($id) {
        $this->reservation->id = $id;
        if ($this->reservation->delete()) {
            header('Location: ' . url('reservation', ['action' => 'list']));
            exit();
        } else {
            echo "Erreur lors de la suppression";
        }
    }

    // Send confirmation email
    private function sendConfirmationEmail() {
        $to = $this->reservation->email;
        $subject = "Confirmation de votre réservation - Servium";
        $message = "<html><head><title>Confirmation de réservation</title></head><body>";
        $message .= "<h2>Confirmation de votre réservation</h2>";
        $message .= "<p>Bonjour " . $this->reservation->nom . ",</p>";
        $message .= "<p>Nous avons bien reçu votre réservation et nous vous en remercions.</p>";
        $message .= "<h3>Détails de votre réservation :</h3><ul>";
        $message .= "<li><strong>Nom :</strong> " . $this->reservation->nom . "</li>";
        $message .= "<li><strong>Email :</strong> " . $this->reservation->email . "</li>";
        $message .= "<li><strong>Téléphone :</strong> " . $this->reservation->telephone . "</li>";
        $message .= "<li><strong>Pays de départ :</strong> " . $this->reservation->pays_depart . "</li>";
        $message .= "<li><strong>Pays d'arrivée :</strong> " . $this->reservation->pays_arrivee . "</li>";
        $message .= "<li><strong>Type de ticket :</strong> " . $this->reservation->type_ticket . "</li>";
        $message .= "<li><strong>Moyen de transport :</strong> " . $this->reservation->moyen_transport . "</li>";
        $message .= "<li><strong>Date de départ :</strong> " . $this->reservation->date_depart . "</li>";
        $message .= "</ul>";
        $message .= "<p>Notre équipe va traiter votre demande dans les plus brefs délais et vous contactera pour finaliser les détails.</p>";
        $message .= "<p>Cordialement,<br>L'équipe Servium</p>";
        $message .= "</body></html>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: contact@servium.com' . "\r\n";
        mail($to, $subject, $message, $headers);
    }

    // API: create reservation via AJAX
    public function apiCreate() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $this->reservation->nom = $input['nom'] ?? '';
            $this->reservation->email = $input['email'] ?? '';
            $this->reservation->telephone = $input['telephone'] ?? '';
            $this->reservation->pays_depart = $input['pays_depart'] ?? '';
            $this->reservation->pays_arrivee = $input['pays_arrivee'] ?? '';
            $this->reservation->type_ticket = $input['type_ticket'] ?? '';
            $this->reservation->moyen_transport = $input['moyen_transport'] ?? '';
            $this->reservation->date_depart = $input['date_depart'] ?? '';
            $this->reservation->message = $input['message'] ?? '';
            $errors = $this->reservation->validate();
            if (empty($errors)) {
                if ($this->reservation->create()) {
                    $this->sendConfirmationEmail();
                    echo json_encode(['success' => true, 'message' => 'Réservation créée avec succès']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de la création']);
                }
            } else {
                echo json_encode(['success' => false, 'errors' => $errors]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        }
    }
} 