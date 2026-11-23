<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reponses'; // Nom de la table dans votre base de données

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'niveau_scolaire',
        'cours',
        'choix',
        'motif',
        'jour',
        'nom',
        'prenom',
        'email',
        'telephone',
    ];

    /**
     * Get the HTML title and options based on the user's response.
     *
     * @param string $response
     * @return array
     */
    public static function getHtmlContent($response)
    {
        $data = [
            'title' => [],
            'options' => [],
        ];

        switch ($response) {
            case 'Primaire':
            case 'Collège':
            case 'Lycée':
            case 'Autre':
                $data['title'] = ["Quel cours souhaite-t-il étudier ? "];
                $data['options'] = ['mathematique', 'Francais', 'Anglais', 'Allemand', 'Italien', 'Espagnol', 'Latin', 'Physique', 'Chimie', 'Biologie', 'Geographie', 'Economie', 'Informatique', 'Comptabilité', 'Histoire', 'Commerce', 'Je ne sais pas encore'];
                break;
            case 'mathematique':
            case 'Francais':
            case 'Anglais':
            case 'Allemand':
            case 'Italien':
            case 'Espagnol':
            case 'Latin':
            case 'Physique':
            case 'Chimie':
            case 'Biologie':
            case 'Geographie':
            case 'Economie':
            case 'Informatique':
            case 'Comptabilité':
            case 'Histoire':
            case 'Commerce':
            case 'Je ne sais pas encore':
                $data['title'] = ["Pourquoi a-t-il besoin de cours particuliers ? 🙋"];
                $data['options'] = ["Ameliorer les notes", "Preparer les examens", "Aide aux devoirs", "Autre raisons"];
                break;
            case 'Ameliorer les notes':
            case 'Preparer les examens':
            case 'Aide aux devoirs':
            case 'Autre raisons':
                $data['title'] = ["Quel(s) jour(s) serait-il disponible ? 📆"];
                $data['options'] = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                break;
            // Ajoutez d'autres cas si nécessaire
            default:
                $data['title'] = ["Merci d'avoir soumis le formulaire. Un agent vous contactera bientôt."];
                $data['options'] = ["Retour au début"];
                break;
        }

        return $data;
    }
}
