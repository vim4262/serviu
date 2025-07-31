<?php
// Reservation model: handles all reservation operations
class Reservation {
    private $conn;
    private $table_name = "reservations";

    // Reservation properties
    public $id;
    public $nom;
    public $email;
    public $telephone;
    public $pays_depart;
    public $pays_arrivee;
    public $type_ticket;
    public $moyen_transport;
    public $date_depart;
    public $message;
    public $date_creation;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new reservation
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    nom = :nom,
                    email = :email,
                    telephone = :telephone,
                    pays_depart = :pays_depart,
                    pays_arrivee = :pays_arrivee,
                    type_ticket = :type_ticket,
                    moyen_transport = :moyen_transport,
                    date_depart = :date_depart,
                    message = :message,
                    date_creation = NOW()";
        $stmt = $this->conn->prepare($query);
        // Clean and validate data
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telephone = htmlspecialchars(strip_tags($this->telephone));
        $this->pays_depart = htmlspecialchars(strip_tags($this->pays_depart));
        $this->pays_arrivee = htmlspecialchars(strip_tags($this->pays_arrivee));
        $this->type_ticket = htmlspecialchars(strip_tags($this->type_ticket));
        $this->moyen_transport = htmlspecialchars(strip_tags($this->moyen_transport));
        $this->date_depart = htmlspecialchars(strip_tags($this->date_depart));
        $this->message = htmlspecialchars(strip_tags($this->message));
        // Bind params
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telephone", $this->telephone);
        $stmt->bindParam(":pays_depart", $this->pays_depart);
        $stmt->bindParam(":pays_arrivee", $this->pays_arrivee);
        $stmt->bindParam(":type_ticket", $this->type_ticket);
        $stmt->bindParam(":moyen_transport", $this->moyen_transport);
        $stmt->bindParam(":date_depart", $this->date_depart);
        $stmt->bindParam(":message", $this->message);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all reservations
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY date_creation DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read a reservation by ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nom = $row['nom'];
            $this->email = $row['email'];
            $this->telephone = $row['telephone'];
            $this->pays_depart = $row['pays_depart'];
            $this->pays_arrivee = $row['pays_arrivee'];
            $this->type_ticket = $row['type_ticket'];
            $this->moyen_transport = $row['moyen_transport'];
            $this->date_depart = $row['date_depart'];
            $this->message = $row['message'];
            $this->date_creation = $row['date_creation'];
            return true;
        }
        return false;
    }

    // Update a reservation
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    nom = :nom,
                    email = :email,
                    telephone = :telephone,
                    pays_depart = :pays_depart,
                    pays_arrivee = :pays_arrivee,
                    type_ticket = :type_ticket,
                    moyen_transport = :moyen_transport,
                    date_depart = :date_depart,
                    message = :message
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        // Clean and validate data
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telephone = htmlspecialchars(strip_tags($this->telephone));
        $this->pays_depart = htmlspecialchars(strip_tags($this->pays_depart));
        $this->pays_arrivee = htmlspecialchars(strip_tags($this->pays_arrivee));
        $this->type_ticket = htmlspecialchars(strip_tags($this->type_ticket));
        $this->moyen_transport = htmlspecialchars(strip_tags($this->moyen_transport));
        $this->date_depart = htmlspecialchars(strip_tags($this->date_depart));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind params
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':pays_depart', $this->pays_depart);
        $stmt->bindParam(':pays_arrivee', $this->pays_arrivee);
        $stmt->bindParam(':type_ticket', $this->type_ticket);
        $stmt->bindParam(':moyen_transport', $this->moyen_transport);
        $stmt->bindParam(':date_depart', $this->date_depart);
        $stmt->bindParam(':message', $this->message);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete a reservation
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Validate reservation data (interface in French)
    public function validate() {
        $errors = [];
        if(empty($this->nom)) {
            $errors[] = "Le nom est requis";
        }
        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email est requis et doit être valide";
        }
        if(empty($this->telephone)) {
            $errors[] = "Le téléphone est requis";
        }
        if(empty($this->pays_depart)) {
            $errors[] = "Le pays de départ est requis";
        }
        if(empty($this->pays_arrivee)) {
            $errors[] = "Le pays d'arrivée est requis";
        }
        if(empty($this->type_ticket)) {
            $errors[] = "Le type de ticket est requis";
        }
        if(empty($this->moyen_transport)) {
            $errors[] = "Le moyen de transport est requis";
        }
        if(empty($this->date_depart)) {
            $errors[] = "La date de départ est requise";
        }
        return $errors;
    }
} 