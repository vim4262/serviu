<?php
class ContactController {
    public function index() {
        $data = [
            'title' => 'Contact - Servium',
            'description' => 'Contactez notre équipe pour vos projets de voyage',
            'contact_info' => [
                'email' => 'contact@servium.com',
                'phone' => '+33 1 23 45 67 89',
                'address' => '123 Rue du Voyage, 75001 Paris, France'
            ],
            'social_media' => [
                'facebook' => '#',
                'instagram' => '#',
                'linkedin' => '#'
            ]
        ];
        // Handle contact form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->processContactForm();
            $data['form_result'] = $result;
        }
        // Load the contact view (interface in French)
        require_once dirname(__DIR__) . '/Views/contact/index.php';
    }
    private function processContactForm() {
        $errors = [];
        $success = false;
        $name = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['sujet'] ?? '');
        $message = trim($_POST['message'] ?? '');
        if (empty($name)) {
            $errors['nom'] = 'Le nom est requis';
        }
        if (empty($email)) {
            $errors['email'] = 'L\'email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide';
        }
        if (empty($subject)) {
            $errors['sujet'] = 'Le sujet est requis';
        }
        if (empty($message)) {
            $errors['message'] = 'Le message est requis';
        }
        if (empty($errors)) {
            $success = true;
        }
        return [
            'success' => $success,
            'errors' => $errors,
            'data' => [
                'nom' => $name,
                'email' => $email,
                'sujet' => $subject,
                'message' => $message
            ]
        ];
    }
}
?> 