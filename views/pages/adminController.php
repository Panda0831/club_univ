<?php
require_once 'models/AdminModel.php';

class AdminController
{
    private $modele;

    public function __construct()
    {
        $this->modele = new AdminModel();
    }

    // Afficher toutes les activités
    public function afficherToutesLesActivites()
    {
        $activites = $this->modele->listerActivites();
        // require 'views/admin/activites.php';
        return $activites;
    }

    // Ajouter une activité
    public function ajouterUneActivite()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donnees = [
                'nom_activite' => htmlspecialchars(trim($_POST['nom_activite'] ?? '')),
                'type_activite' => htmlspecialchars(trim($_POST['type_activite'] ?? '')),
                'date_activite' => htmlspecialchars(trim($_POST['date_activite'] ?? '')),
                'date_fin_inscription' => htmlspecialchars(trim($_POST['date_fin_inscription'] ?? '')),
                'lieu' => htmlspecialchars(trim($_POST['lieu'] ?? '')),
                'description' => htmlspecialchars(trim($_POST['description'] ?? '')),
                'club_id' => intval($_POST['club_id'] ?? 0),
                'responsable_id' => intval($_POST['responsable_id'] ?? 0),
                'participants_max' => intval($_POST['participants_max'] ?? 0),
            ];

            // Validation simple
            foreach ($donnees as $le_fenona=> $val) {
                if (($val === '' || $val === 0) && !in_array($le_fenona, ['participants_max'])) {
                    echo "<div class='alert alert-danger'>Le champ $le_fenona est obligatoire.</div>";
                    // require 'views/admin/ajouter_activite.php';
                    return;
                }
            }

            if ($this->modele->creerActivite($donnees)) {
                // header('Location: index.php?action=afficherToutesLesActivites');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de la création de l'activité.</div>";
                // require 'views/admin/ajouter_activite.php';
            }
        }

        // require 'views/admin/ajouter_activite.php';
    }

    // Modifier une activité
    public function modifierUneActivite($id_activite)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donnees = [
                'nom_activite' => htmlspecialchars(trim($_POST['nom_activite'] ?? '')),
                'type_activite' => htmlspecialchars(trim($_POST['type_activite'] ?? '')),
                'date_activite' => htmlspecialchars(trim($_POST['date_activite'] ?? '')),
                'date_fin_inscription' => htmlspecialchars(trim($_POST['date_fin_inscription'] ?? '')),
                'lieu' => htmlspecialchars(trim($_POST['lieu'] ?? '')),
                'description' => htmlspecialchars(trim($_POST['description'] ?? '')),
                'club_id' => intval($_POST['club_id'] ?? 0),
                'responsable_id' => intval($_POST['responsable_id'] ?? 0),
                'participants_max' => intval($_POST['participants_max'] ?? 0),
            ];

            foreach ($donnees as $key => $val) {
                if (($val === '' || $val === 0) && !in_array($key, ['participants_max'])) {
                    echo "<div class='alert alert-danger'>Le champ $key est obligatoire.</div>";
                    $activite = $this->modele->trouverActiviteParId($id_activite);
                    // require 'views/admin/modifier_activite.php';
                    return;
                }
            }

            if ($this->modele->modifierActivite($id_activite, $donnees)) {
                // header('Location: index.php?action=afficherToutesLesActivites');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de la modification de l'activité.</div>";
                $activite = $this->modele->trouverActiviteParId($id_activite);
                // require 'views/admin/modifier_activite.php';
            }
        }

        $activite = $this->modele->trouverActiviteParId($id_activite);
        // require 'views/admin/modifier_activite.php';
        return $activite;
    }

    // Supprimer une activité
    public function supprimerUneActivite($id_activite)
    {
        $this->modele->supprimerActivite($id_activite);
        // header('Location: index.php?action=afficherToutesLesActivites');
        exit;
    }
}
