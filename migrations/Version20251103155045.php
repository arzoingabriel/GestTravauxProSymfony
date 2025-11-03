<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251103155045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD nom_admin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE admin ADD prenom_admin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE admin ADD mdp_admin VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE admin ADD droit_admin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bien ADD adresse_bien VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bien ADD ville_bien VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bien ADD cp_bien VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE chantier ADD ville_chantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chantier ADD adresse_chantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chantier ADD cp_chantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chantier ADD info_chantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chantier ADD statut_chantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE devis ADD prix INT NOT NULL');
        $this->addSql('ALTER TABLE devis ADD duree VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE devis_type ADD prix INT NOT NULL');
        $this->addSql('ALTER TABLE devis_type ADD duree VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE entrepreneur ADD ville_deploiment VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE entrepreneur ADD nom_entrepreneur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE entrepreneur ADD prenom_entrepreneur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE entrepreneur ADD email_entrepreneur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE entrepreneur ADD tel_entrepreneur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gestionnaire ADD nom_gestionnaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gestionnaire ADD prenom_gestionnaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gestionnaire ADD email_gestionnaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gestionnaire ADD tel_gestionnaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inspecteur ADD nom_inspecteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inspecteur ADD prenom_inspecteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inspecteur ADD email_inspecteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inspecteur ADD tel_inspecteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inspecteur ADD secteur_inspecteur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD id_photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE prestation ADD libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD nom_porprietaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD prenom_proprietaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD email_proprietaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD tel_proprietaire VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE gestionnaire DROP nom_gestionnaire');
        $this->addSql('ALTER TABLE gestionnaire DROP prenom_gestionnaire');
        $this->addSql('ALTER TABLE gestionnaire DROP email_gestionnaire');
        $this->addSql('ALTER TABLE gestionnaire DROP tel_gestionnaire');
        $this->addSql('ALTER TABLE photo DROP id_photo');
        $this->addSql('ALTER TABLE proprietaire DROP nom_porprietaire');
        $this->addSql('ALTER TABLE proprietaire DROP prenom_proprietaire');
        $this->addSql('ALTER TABLE proprietaire DROP email_proprietaire');
        $this->addSql('ALTER TABLE proprietaire DROP tel_proprietaire');
        $this->addSql('ALTER TABLE admin DROP nom_admin');
        $this->addSql('ALTER TABLE admin DROP prenom_admin');
        $this->addSql('ALTER TABLE admin DROP mdp_admin');
        $this->addSql('ALTER TABLE admin DROP droit_admin');
        $this->addSql('ALTER TABLE chantier DROP ville_chantier');
        $this->addSql('ALTER TABLE chantier DROP adresse_chantier');
        $this->addSql('ALTER TABLE chantier DROP cp_chantier');
        $this->addSql('ALTER TABLE chantier DROP info_chantier');
        $this->addSql('ALTER TABLE chantier DROP statut_chantier');
        $this->addSql('ALTER TABLE devis_type DROP prix');
        $this->addSql('ALTER TABLE devis_type DROP duree');
        $this->addSql('ALTER TABLE prestation DROP libelle');
        $this->addSql('ALTER TABLE bien DROP adresse_bien');
        $this->addSql('ALTER TABLE bien DROP ville_bien');
        $this->addSql('ALTER TABLE bien DROP cp_bien');
        $this->addSql('ALTER TABLE devis DROP prix');
        $this->addSql('ALTER TABLE devis DROP duree');
        $this->addSql('ALTER TABLE categorie DROP type');
        $this->addSql('ALTER TABLE categorie DROP libelle');
        $this->addSql('ALTER TABLE inspecteur DROP nom_inspecteur');
        $this->addSql('ALTER TABLE inspecteur DROP prenom_inspecteur');
        $this->addSql('ALTER TABLE inspecteur DROP email_inspecteur');
        $this->addSql('ALTER TABLE inspecteur DROP tel_inspecteur');
        $this->addSql('ALTER TABLE inspecteur DROP secteur_inspecteur');
        $this->addSql('ALTER TABLE entrepreneur DROP ville_deploiment');
        $this->addSql('ALTER TABLE entrepreneur DROP nom_entrepreneur');
        $this->addSql('ALTER TABLE entrepreneur DROP prenom_entrepreneur');
        $this->addSql('ALTER TABLE entrepreneur DROP email_entrepreneur');
        $this->addSql('ALTER TABLE entrepreneur DROP tel_entrepreneur');
    }
}
