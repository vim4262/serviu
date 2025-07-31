<?php
class HomeController {
    public function index() {
        $data = [
            'title' => 'Servium - Accueil',
            'description' => 'Chez Servium, nous vous accompagnons dans tous vos projets de voyage avec expertise, passion et fiabilité.',
            'articles' => [
                [
                    'title' => 'Top 5 des Destinations Incontournables en 2025',
                    'author' => 'Servium',
                    'date' => '10 Mai 2025',
                    'image' => 'Public/assets/images/5des.jpg',
                    'alt' => 'Top destinations 2025',
                    'link' => 'publication'
                ],
                [
                    'title' => '10 Astuces pour Voyager Moins Cher',
                    'author' => 'L\'équipe Servium',
                    'date' => '5 Mai 2025',
                    'image' => 'Public/assets/images/ast.avif',
                    'alt' => 'Astuces pour voyager moins cher',
                    'link' => 'publication#article-astuces'
                ],
                [
                    'title' => 'Visa Touristique : Tout Ce Que Vous Devez Savoir',
                    'author' => 'Servium Experts',
                    'date' => '1 Mai 2025',
                    'image' => 'Public/assets/images/tou.jpg',
                    'alt' => 'Visa Touristique',
                    'link' => 'publication#article-visa'
                ]
            ],
            'services' => [
                [
                    'title' => 'Réservation de billets',
                    'description' => 'Vols nationaux et internationaux à prix compétitifs.',
                    'link' => 'service1'
                ],
                [
                    'title' => 'Réservation d\'hébergement',
                    'description' => 'Hôtels, appartements, auberges pour tous les budgets.',
                    'link' => 'service2'
                ],
                [
                    'title' => 'Assistance visa',
                    'description' => 'Conseils et accompagnement pour vos demandes de visa.',
                    'link' => 'service4'
                ],
                [
                    'title' => 'Circuits touristiques',
                    'description' => 'Voyages organisés et excursions personnalisées.',
                    'link' => 'service3'
                ]
            ]
        ];
        // Load the home view (interface in French)
        require_once dirname(__DIR__) . '/Views/home/index.php';
    }
} 