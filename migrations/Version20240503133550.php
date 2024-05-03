<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503133550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, race_id INT DEFAULT NULL, habitat_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, poid VARCHAR(255) NOT NULL, taille VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, INDEX IDX_6AAB231F6E59D40D (race_id), INDEX IDX_6AAB231FAFFE2D26 (habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, date DATE NOT NULL, valide TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, creer DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', modifier DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom_photo VARCHAR(255) NOT NULL, taille_photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(255) NOT NULL, ouverture VARCHAR(255) NOT NULL, fermeture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, creer DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', modifier DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom_photo VARCHAR(255) NOT NULL, taille_photo VARCHAR(255) NOT NULL, INDEX IDX_14B784188E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapport (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date DATE NOT NULL, nourriture VARCHAR(255) NOT NULL, grammage_nourriture VARCHAR(255) NOT NULL, remarque LONGTEXT DEFAULT NULL, INDEX IDX_BE34A09C8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date DATE NOT NULL, aliment VARCHAR(255) NOT NULL, quantite VARCHAR(255) NOT NULL, INDEX IDX_A8D351B38E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, type_de_service_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, creer DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', modifier DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom_photo VARCHAR(255) NOT NULL, taille_photo VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD2E4B2B215 (type_de_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_de_service (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, creer DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', modifier DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom_photo VARCHAR(255) NOT NULL, taille_photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784188E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE rapport ADD CONSTRAINT FK_BE34A09C8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B38E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2E4B2B215 FOREIGN KEY (type_de_service_id) REFERENCES type_de_service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F6E59D40D');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784188E962C16');
        $this->addSql('ALTER TABLE rapport DROP FOREIGN KEY FK_BE34A09C8E962C16');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B38E962C16');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2E4B2B215');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE type_de_service');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
