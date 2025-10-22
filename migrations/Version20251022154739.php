<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251022154739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE bien (id SERIAL NOT NULL, proprietaire_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_45EDC38676C50E4A ON bien (proprietaire_id)');
        $this->addSql('CREATE TABLE categorie (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE chantier (id SERIAL NOT NULL, bien_id INT NOT NULL, inspecteur_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_636F27F6BD95B80F ON chantier (bien_id)');
        $this->addSql('CREATE INDEX IDX_636F27F6B7728AA0 ON chantier (inspecteur_id)');
        $this->addSql('CREATE TABLE devis (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE devis_type (id SERIAL NOT NULL, chantier_id INT NOT NULL, gestionnaire_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C30C36F6D0C0049D ON devis_type (chantier_id)');
        $this->addSql('CREATE INDEX IDX_C30C36F66885AC1B ON devis_type (gestionnaire_id)');
        $this->addSql('CREATE TABLE devis_type_prestation (devis_type_id INT NOT NULL, prestation_id INT NOT NULL, PRIMARY KEY(devis_type_id, prestation_id))');
        $this->addSql('CREATE INDEX IDX_2405934557A217CF ON devis_type_prestation (devis_type_id)');
        $this->addSql('CREATE INDEX IDX_240593459E45C554 ON devis_type_prestation (prestation_id)');
        $this->addSql('CREATE TABLE entrepreneur (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE entrepreneur_categorie (entrepreneur_id INT NOT NULL, categorie_id INT NOT NULL, PRIMARY KEY(entrepreneur_id, categorie_id))');
        $this->addSql('CREATE INDEX IDX_7B6E3FA0283063EA ON entrepreneur_categorie (entrepreneur_id)');
        $this->addSql('CREATE INDEX IDX_7B6E3FA0BCF5E72D ON entrepreneur_categorie (categorie_id)');
        $this->addSql('CREATE TABLE gestionnaire (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE inspecteur (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE photo (id SERIAL NOT NULL, chantier_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_14B78418D0C0049D ON photo (chantier_id)');
        $this->addSql('CREATE TABLE prestation (id SERIAL NOT NULL, categorie_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_51C88FADBCF5E72D ON prestation (categorie_id)');
        $this->addSql('CREATE TABLE prestation_devis (prestation_id INT NOT NULL, devis_id INT NOT NULL, PRIMARY KEY(prestation_id, devis_id))');
        $this->addSql('CREATE INDEX IDX_49AC8EAA9E45C554 ON prestation_devis (prestation_id)');
        $this->addSql('CREATE INDEX IDX_49AC8EAA41DEFADA ON prestation_devis (devis_id)');
        $this->addSql('CREATE TABLE proprietaire (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38676C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chantier ADD CONSTRAINT FK_636F27F6BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chantier ADD CONSTRAINT FK_636F27F6B7728AA0 FOREIGN KEY (inspecteur_id) REFERENCES inspecteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_type ADD CONSTRAINT FK_C30C36F6D0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_type ADD CONSTRAINT FK_C30C36F66885AC1B FOREIGN KEY (gestionnaire_id) REFERENCES gestionnaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_type_prestation ADD CONSTRAINT FK_2405934557A217CF FOREIGN KEY (devis_type_id) REFERENCES devis_type (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_type_prestation ADD CONSTRAINT FK_240593459E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entrepreneur_categorie ADD CONSTRAINT FK_7B6E3FA0283063EA FOREIGN KEY (entrepreneur_id) REFERENCES entrepreneur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entrepreneur_categorie ADD CONSTRAINT FK_7B6E3FA0BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418D0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE prestation_devis ADD CONSTRAINT FK_49AC8EAA9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE prestation_devis ADD CONSTRAINT FK_49AC8EAA41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bien DROP CONSTRAINT FK_45EDC38676C50E4A');
        $this->addSql('ALTER TABLE chantier DROP CONSTRAINT FK_636F27F6BD95B80F');
        $this->addSql('ALTER TABLE chantier DROP CONSTRAINT FK_636F27F6B7728AA0');
        $this->addSql('ALTER TABLE devis_type DROP CONSTRAINT FK_C30C36F6D0C0049D');
        $this->addSql('ALTER TABLE devis_type DROP CONSTRAINT FK_C30C36F66885AC1B');
        $this->addSql('ALTER TABLE devis_type_prestation DROP CONSTRAINT FK_2405934557A217CF');
        $this->addSql('ALTER TABLE devis_type_prestation DROP CONSTRAINT FK_240593459E45C554');
        $this->addSql('ALTER TABLE entrepreneur_categorie DROP CONSTRAINT FK_7B6E3FA0283063EA');
        $this->addSql('ALTER TABLE entrepreneur_categorie DROP CONSTRAINT FK_7B6E3FA0BCF5E72D');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B78418D0C0049D');
        $this->addSql('ALTER TABLE prestation DROP CONSTRAINT FK_51C88FADBCF5E72D');
        $this->addSql('ALTER TABLE prestation_devis DROP CONSTRAINT FK_49AC8EAA9E45C554');
        $this->addSql('ALTER TABLE prestation_devis DROP CONSTRAINT FK_49AC8EAA41DEFADA');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE chantier');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_type');
        $this->addSql('DROP TABLE devis_type_prestation');
        $this->addSql('DROP TABLE entrepreneur');
        $this->addSql('DROP TABLE entrepreneur_categorie');
        $this->addSql('DROP TABLE gestionnaire');
        $this->addSql('DROP TABLE inspecteur');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE prestation_devis');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
