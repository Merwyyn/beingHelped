<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181208164634 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE membres (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(100) NOT NULL, forget_key VARCHAR(10) DEFAULT NULL, register_key VARCHAR(10) DEFAULT NULL, type SMALLINT NOT NULL, flag SMALLINT NOT NULL, date_flag TIME DEFAULT NULL, amount INT NOT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(40) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(70) NOT NULL, pays VARCHAR(40) NOT NULL, telephone VARCHAR(20) NOT NULL, sexe SMALLINT NOT NULL, date_naissance TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE membres');
    }
}
