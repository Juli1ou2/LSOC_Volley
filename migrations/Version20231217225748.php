<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217225748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, ville VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entraineur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, adresse VARCHAR(120) DEFAULT NULL, email VARCHAR(50) NOT NULL, chemin_photo VARCHAR(255) DEFAULT NULL, genre VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entraineur_equipe (entraineur_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_97E34CE3F8478A1 (entraineur_id), INDEX IDX_97E34CE36D861B89 (equipe_id), PRIMARY KEY(entraineur_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, classement VARCHAR(50) DEFAULT NULL, INDEX IDX_2449BA1561190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_match_volley (equipe_id INT NOT NULL, match_volley_id INT NOT NULL, INDEX IDX_51C338426D861B89 (equipe_id), INDEX IDX_51C33842980FB2F4 (match_volley_id), PRIMARY KEY(equipe_id, match_volley_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, libelle VARCHAR(150) NOT NULL, date_evenement DATE NOT NULL, heure_evenement TIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_B26681E61190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, numero_licence VARCHAR(25) NOT NULL, numero INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, date_naissance DATE NOT NULL, taille INT DEFAULT NULL, poste VARCHAR(50) NOT NULL, nationalite VARCHAR(50) DEFAULT NULL, chemin_photo VARCHAR(255) DEFAULT NULL, genre VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_equipe (joueur_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_CDF2AA99A9E2D76C (joueur_id), INDEX IDX_CDF2AA996D861B89 (equipe_id), PRIMARY KEY(joueur_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE match_volley (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, id_equipe_vainqueur INT DEFAULT NULL, id_equipe_perdant INT DEFAULT NULL, score VARCHAR(3) DEFAULT NULL, duree TIME DEFAULT NULL, date_match DATE NOT NULL, INDEX IDX_D7DA7A6761190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entraineur_equipe ADD CONSTRAINT FK_97E34CE3F8478A1 FOREIGN KEY (entraineur_id) REFERENCES entraineur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entraineur_equipe ADD CONSTRAINT FK_97E34CE36D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE equipe_match_volley ADD CONSTRAINT FK_51C338426D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe_match_volley ADD CONSTRAINT FK_51C33842980FB2F4 FOREIGN KEY (match_volley_id) REFERENCES match_volley (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE joueur_equipe ADD CONSTRAINT FK_CDF2AA99A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_equipe ADD CONSTRAINT FK_CDF2AA996D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE match_volley ADD CONSTRAINT FK_D7DA7A6761190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entraineur_equipe DROP FOREIGN KEY FK_97E34CE3F8478A1');
        $this->addSql('ALTER TABLE entraineur_equipe DROP FOREIGN KEY FK_97E34CE36D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1561190A32');
        $this->addSql('ALTER TABLE equipe_match_volley DROP FOREIGN KEY FK_51C338426D861B89');
        $this->addSql('ALTER TABLE equipe_match_volley DROP FOREIGN KEY FK_51C33842980FB2F4');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E61190A32');
        $this->addSql('ALTER TABLE joueur_equipe DROP FOREIGN KEY FK_CDF2AA99A9E2D76C');
        $this->addSql('ALTER TABLE joueur_equipe DROP FOREIGN KEY FK_CDF2AA996D861B89');
        $this->addSql('ALTER TABLE match_volley DROP FOREIGN KEY FK_D7DA7A6761190A32');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE entraineur');
        $this->addSql('DROP TABLE entraineur_equipe');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE equipe_match_volley');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_equipe');
        $this->addSql('DROP TABLE match_volley');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
