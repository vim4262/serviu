<?php
class ServiceController {
    public function index() {
        $data = [
            'title' => 'Nos Services - Servium',
            'description' => 'Découvrez tous nos services de voyage',
            'services' => [
                [
                    'id' => 'service1',
                    'title' => 'Réservation de billets',
                    'description' => 'Vols nationaux et internationaux à prix compétitifs.',
                    'image' => 'Public/assets/images/billet.jpg',
                    'features' => [
                        'Vols directs et avec escales',
                        'Prix compétitifs garantis',
                        'Réservation 24h/24',
                        'Assistance clientèle'
                    ]
                ],
                [
                    'id' => 'service2',
                    'title' => 'Réservation d\'hébergement',
                    'description' => 'Hôtels, appartements, auberges pour tous les budgets.',
                    'image' => 'Public/assets/images/hotel.jpg',
                    'features' => [
                        'Hôtels de luxe et économiques',
                        'Appartements et villas',
                        'Auberges de jeunesse',
                        'Réservations sécurisées'
                    ]
                ],
                [
                    'id' => 'service3',
                    'title' => 'Circuits touristiques',
                    'description' => 'Voyages organisés et excursions personnalisées.',
                    'image' => 'Public/assets/images/guide.jpg',
                    'features' => [
                        'Circuits guidés',
                        'Excursions personnalisées',
                        'Guides locaux expérimentés',
                        'Transport inclus'
                    ]
                ],
                [
                    'id' => 'service4',
                    'title' => 'Assistance visa',
                    'description' => 'Conseils et accompagnement pour vos demandes de visa.',
                    'image' => 'Public/assets/images/DOC.webp',
                    'features' => [
                        'Conseils personnalisés',
                        'Accompagnement complet',
                        'Suivi de dossier',
                        'Assurance visa'
                    ]
                ]
            ]
        ];
        // Load the services view (interface in French)
        require_once dirname(__DIR__) . '/Views/services/index.php';
    }
    public function show($serviceId) {
        $services = [
            'service1' => [
                'title' => 'Réservation de billets',
                'description' => 'Vols nationaux et internationaux à prix compétitifs.',
                'image' => 'Public/assets/images/billet.jpg',
                'content' => 'Notre service de réservation de billets vous offre une large gamme d\'options pour vos déplacements. Que vous voyagiez pour les affaires ou les loisirs, nous vous proposons les meilleures offres du marché.',
                'features' => [
                    'Vols directs et avec escales',
                    'Prix compétitifs garantis',
                    'Réservation 24h/24',
                    'Assistance clientèle',
                    'Modification et annulation flexibles',
                    'Programme de fidélité'
                ]
            ],
            'service2' => [
                'title' => 'Réservation d\'hébergement',
                'description' => 'Hôtels, appartements, auberges pour tous les budgets.',
                'image' => 'Public/assets/images/hotel.jpg',
                'content' => 'Trouvez l\'hébergement parfait pour votre séjour. De l\'hôtel de luxe à l\'auberge de jeunesse, nous avons des options pour tous les budgets et toutes les préférences.',
                'features' => [
                    'Hôtels de luxe et économiques',
                    'Appartements et villas',
                    'Auberges de jeunesse',
                    'Réservations sécurisées',
                    'Photos et avis clients',
                    'Annulation gratuite'
                ]
            ],
            'service3' => [
                'title' => 'Circuits touristiques',
                'description' => 'Voyages organisés et excursions personnalisées.',
                'image' => 'Public/assets/images/guide.jpg',
                'content' => 'Découvrez le monde avec nos circuits touristiques personnalisés. Nos guides expérimentés vous feront découvrir les plus beaux sites et les expériences locales authentiques.',
                'features' => [
                    'Circuits guidés',
                    'Excursions personnalisées',
                    'Guides locaux expérimentés',
                    'Transport inclus',
                    'Hébergement de qualité',
                    'Assurance voyage'
                ]
            ],
            'service4' => [
                'title' => 'Assistance visa',
                'description' => 'Conseils et accompagnement pour vos demandes de visa.',
                'image' => 'Public/assets/images/DOC.webp',
                'content' => 'Simplifiez vos démarches de visa avec notre assistance complète. Nos experts vous accompagnent à chaque étape pour maximiser vos chances d\'obtention.',
                'features' => [
                    'Conseils personnalisés',
                    'Accompagnement complet',
                    'Suivi de dossier',
                    'Assurance visa',
                    'Documentation requise',
                    'Support multilingue'
                ]
            ]
        ];
        if (isset($services[$serviceId])) {
            $data = [
                'title' => $services[$serviceId]['title'] . ' - Servium',
                'service' => $services[$serviceId]
            ];
            require_once dirname(__DIR__) . '/Views/services/show.php';
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once dirname(__DIR__) . '/Views/errors/404.php';
        }
    }
} 