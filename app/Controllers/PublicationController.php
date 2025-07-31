<?php
class PublicationController {
    public function index() {
        $data = [
            'title' => 'Publications & Actualités - Servium',
            'description' => 'Découvrez nos derniers articles et actualités sur le voyage',
            'articles' => [
                [
                    'id' => 'top-destinations-2025',
                    'title' => 'Top 5 des Destinations Incontournables en 2025',
                    'author' => 'Servium',
                    'date' => '10 Mai 2025',
                    'image' => 'Public/assets/images/5des.jpg',
                    'alt' => 'Top destinations 2025',
                    'excerpt' => 'Découvrez les destinations qui vont faire sensation en 2025. De nouvelles expériences vous attendent !',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...'
                ],
                [
                    'id' => 'astuces-voyage',
                    'title' => '10 Astuces pour Voyager Moins Cher',
                    'author' => 'L\'équipe Servium',
                    'date' => '5 Mai 2025',
                    'image' => 'Public/assets/images/ast.avif',
                    'alt' => 'Astuces pour voyager moins cher',
                    'excerpt' => 'Nos experts partagent leurs meilleures astuces pour réduire le coût de vos voyages sans sacrifier la qualité.',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...'
                ],
                [
                    'id' => 'visa-touristique',
                    'title' => 'Visa Touristique : Tout Ce Que Vous Devez Savoir',
                    'author' => 'Servium Experts',
                    'date' => '1 Mai 2025',
                    'image' => 'Public/assets/images/tou.jpg',
                    'alt' => 'Visa Touristique',
                    'excerpt' => 'Guide complet pour comprendre les démarches de visa et éviter les pièges courants.',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...'
                ]
            ]
        ];
        // Load the publication view (interface in French)
        require_once dirname(__DIR__) . '/Views/publication/index.php';
    }
    public function show($id) {
        $articles = [
            'top-destinations-2025' => [
                'title' => 'Top 5 des Destinations Incontournables en 2025',
                'author' => 'Servium',
                'date' => '10 Mai 2025',
                'image' => 'Public/assets/images/5des.jpg',
                'content' => 'Contenu détaillé de l\'article sur les destinations 2025...'
            ],
            'astuces-voyage' => [
                'title' => '10 Astuces pour Voyager Moins Cher',
                'author' => 'L\'équipe Servium',
                'date' => '5 Mai 2025',
                'image' => 'Public/assets/images/ast.avif',
                'content' => 'Contenu détaillé de l\'article sur les astuces de voyage...'
            ],
            'visa-touristique' => [
                'title' => 'Visa Touristique : Tout Ce Que Vous Devez Savoir',
                'author' => 'Servium Experts',
                'date' => '1 Mai 2025',
                'image' => 'Public/assets/images/tou.jpg',
                'content' => 'Contenu détaillé de l\'article sur les visas...'
            ]
        ];
        if (isset($articles[$id])) {
            $data = [
                'title' => $articles[$id]['title'] . ' - Servium',
                'article' => $articles[$id]
            ];
            require_once dirname(__DIR__) . '/Views/publication/show.php';
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once dirname(__DIR__) . '/Views/errors/404.php';
        }
    }
} 