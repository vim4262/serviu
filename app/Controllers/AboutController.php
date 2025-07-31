<?php
class AboutController {
    public function index() {
        $data = [
            'title' => 'À propos - Servium',
            'description' => 'Découvrez qui nous sommes et notre mission chez Servium',
            'content' => [
                'mission' => 'Chez Servium, nous transformons vos envies d\'évasion en expériences inoubliables.',
                'description' => 'Que ce soit pour un voyage d\'affaires, une escapade en famille ou une aventure personnelle, notre équipe vous accompagne avec professionnalisme, écoute et passion.',
                'expertise' => 'Grâce à notre expertise du secteur, nous vous garantissons des prestations fiables, personnalisées et au meilleur rapport qualité-prix.',
                'promise' => 'Explorez le monde en toute sérénité avec Servium.'
            ],
            'team' => [
                [
                    'name' => 'Équipe Servium',
                    'role' => 'Experts en voyage',
                    'description' => 'Notre équipe passionnée vous accompagne dans tous vos projets de voyage.'
                ]
            ]
        ];
        // Load the about view (interface in French)
        require_once dirname(__DIR__) . '/Views/about/index.php';
    }
}
?> 