/**
 * Script de gestion du formulaire de réservation
 * Validation côté client et soumission AJAX
 */

class ReservationForm {
    constructor() {
        this.form = document.getElementById('reservationForm');
        this.submitBtn = document.getElementById('submitBtn');
        this.loading = document.getElementById('loading');
        this.errors = {};
        
        this.init();
    }

    init() {
        if (this.form) {
            this.setupEventListeners();
            this.setupDateValidation();
        }
    }

    setupEventListeners() {
        // Écouter la soumission du formulaire
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });

        // Validation en temps réel
        const inputs = this.form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                this.validateField(input);
            });
            
            input.addEventListener('input', () => {
                this.clearFieldError(input);
            });
        });
    }

    setupDateValidation() {
        const dateInput = document.getElementById('date_depart');
        if (dateInput) {
            // Définir la date minimale à aujourd'hui
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
            
            dateInput.addEventListener('change', () => {
                this.validateDate(dateInput);
            });
        }
    }

    validateField(field) {
        const fieldName = field.name;
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';

        // Validation spécifique selon le type de champ
        switch (fieldName) {
            case 'nom':
                if (!value) {
                    errorMessage = 'Le nom est requis';
                    isValid = false;
                } else if (value.length < 2) {
                    errorMessage = 'Le nom doit contenir au moins 2 caractères';
                    isValid = false;
                }
                break;

            case 'email':
                if (!value) {
                    errorMessage = 'L\'email est requis';
                    isValid = false;
                } else if (!this.isValidEmail(value)) {
                    errorMessage = 'Veuillez entrer un email valide';
                    isValid = false;
                }
                break;

            case 'telephone':
                if (!value) {
                    errorMessage = 'Le téléphone est requis';
                    isValid = false;
                } else if (!this.isValidPhone(value)) {
                    errorMessage = 'Veuillez entrer un numéro de téléphone valide';
                    isValid = false;
                }
                break;

            case 'pays_depart':
            case 'pays_arrivee':
                if (!value) {
                    errorMessage = 'Ce champ est requis';
                    isValid = false;
                } else if (value.length < 2) {
                    errorMessage = 'Le nom du pays doit contenir au moins 2 caractères';
                    isValid = false;
                }
                break;

            case 'type_ticket':
            case 'moyen_transport':
                if (!value) {
                    errorMessage = 'Veuillez sélectionner une option';
                    isValid = false;
                }
                break;

            case 'date_depart':
                if (!value) {
                    errorMessage = 'La date de départ est requise';
                    isValid = false;
                } else if (!this.isValidDate(value)) {
                    errorMessage = 'La date doit être dans le futur';
                    isValid = false;
                }
                break;
        }

        if (!isValid) {
            this.showFieldError(field, errorMessage);
            this.errors[fieldName] = errorMessage;
        } else {
            this.clearFieldError(field);
            delete this.errors[fieldName];
        }

        return isValid;
    }

    validateDate(dateInput) {
        const selectedDate = new Date(dateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            this.showFieldError(dateInput, 'La date de départ doit être dans le futur');
            this.errors['date_depart'] = 'La date de départ doit être dans le futur';
            return false;
        } else {
            this.clearFieldError(dateInput);
            delete this.errors['date_depart'];
            return true;
        }
    }

    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    isValidPhone(phone) {
        // Regex pour accepter différents formats de téléphone
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
        return phoneRegex.test(phone);
    }

    isValidDate(dateString) {
        const selectedDate = new Date(dateString);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        return selectedDate >= today;
    }

    showFieldError(field, message) {
        const errorElement = document.getElementById(field.name + '-error');
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
            field.style.borderColor = '#dc3545';
        }
    }

    clearFieldError(field) {
        const errorElement = document.getElementById(field.name + '-error');
        if (errorElement) {
            errorElement.textContent = '';
            errorElement.style.display = 'none';
            field.style.borderColor = '#ddd';
        }
    }

    validateForm() {
        const inputs = this.form.querySelectorAll('input, select, textarea');
        let isValid = true;

        inputs.forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    async handleSubmit() {
        if (!this.validateForm()) {
            this.showFormError('Veuillez corriger les erreurs dans le formulaire');
            return;
        }

        this.setLoading(true);

        try {
            const formData = new FormData(this.form);
            const data = Object.fromEntries(formData.entries());

            const response = await fetch('../../mvc/controllers/ReservationController.php?action=apiCreate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                this.showSuccess(result.message);
                this.form.reset();
                // Rediriger vers la page de succès après 2 secondes
                setTimeout(() => {
                    window.location.href = '../../mvc/views/reservation/success.php';
                }, 2000);
            } else {
                if (result.errors) {
                    this.showServerErrors(result.errors);
                } else {
                    this.showFormError(result.message || 'Une erreur est survenue');
                }
            }
        } catch (error) {
            console.error('Erreur lors de la soumission:', error);
            this.showFormError('Erreur de connexion. Veuillez réessayer.');
        } finally {
            this.setLoading(false);
        }
    }

    showServerErrors(errors) {
        // Afficher les erreurs serveur dans les champs correspondants
        Object.keys(errors).forEach(fieldName => {
            const field = this.form.querySelector(`[name="${fieldName}"]`);
            if (field) {
                this.showFieldError(field, errors[fieldName]);
            }
        });
    }

    showFormError(message) {
        // Créer ou mettre à jour le message d'erreur général
        let errorContainer = document.getElementById('form-error');
        if (!errorContainer) {
            errorContainer = document.createElement('div');
            errorContainer.id = 'form-error';
            errorContainer.className = 'error';
            errorContainer.style.marginBottom = '1rem';
            this.form.insertBefore(errorContainer, this.form.firstChild);
        }
        errorContainer.textContent = message;
        errorContainer.style.display = 'block';
    }

    showSuccess(message) {
        // Créer ou mettre à jour le message de succès
        let successContainer = document.getElementById('form-success');
        if (!successContainer) {
            successContainer = document.createElement('div');
            successContainer.id = 'form-success';
            successContainer.className = 'success';
            successContainer.style.marginBottom = '1rem';
            this.form.insertBefore(successContainer, this.form.firstChild);
        }
        successContainer.textContent = message;
        successContainer.style.display = 'block';
    }

    setLoading(loading) {
        if (loading) {
            this.submitBtn.disabled = true;
            this.submitBtn.textContent = 'Traitement...';
            this.loading.style.display = 'block';
        } else {
            this.submitBtn.disabled = false;
            this.submitBtn.textContent = 'Réserver maintenant';
            this.loading.style.display = 'none';
        }
    }
}

// Initialiser le formulaire quand le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    new ReservationForm();
});

// Fonctions utilitaires pour l'export
window.ReservationUtils = {
    isValidEmail: (email) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },
    
    isValidPhone: (phone) => {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
        return phoneRegex.test(phone);
    },
    
    formatPhone: (phone) => {
        // Supprimer tous les caractères non numériques
        return phone.replace(/\D/g, '');
    }
}; 