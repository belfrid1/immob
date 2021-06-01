<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414204114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, libelle_type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F65593E5BD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, ville_id INT NOT NULL, etat_id INT NOT NULL, tranche_id INT NOT NULL, type_bien_id INT NOT NULL, nom VARCHAR(255) NOT NULL, surface VARCHAR(255) NOT NULL, piece VARCHAR(255) NOT NULL, INDEX IDX_45EDC38676C50E4A (proprietaire_id), INDEX IDX_45EDC386A73F0036 (ville_id), INDEX IDX_45EDC386D5E86FF (etat_id), INDEX IDX_45EDC386B76F6B31 (tranche_id), INDEX IDX_45EDC38695B4D7FA (type_bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, date_signature DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle_etat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, nom VARCHAR(255) NOT NULL, chemin VARCHAR(255) NOT NULL, INDEX IDX_C53D045FBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tranche (id INT AUTO_INCREMENT NOT NULL, prix_min INT NOT NULL, prix_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bien (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38676C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386B76F6B31 FOREIGN KEY (tranche_id) REFERENCES tranche (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38695B4D7FA FOREIGN KEY (type_bien_id) REFERENCES type_bien (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5BD95B80F');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBD95B80F');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386D5E86FF');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A6E44244');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC38676C50E4A');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386B76F6B31');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC38695B4D7FA');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386A73F0036');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE tranche');
        $this->addSql('DROP TABLE type_bien');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
