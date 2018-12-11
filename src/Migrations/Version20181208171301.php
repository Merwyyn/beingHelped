<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181208171301 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lexique (id INT AUTO_INCREMENT NOT NULL, pere_id INT NOT NULL, mot VARCHAR(30) NOT NULL, INDEX IDX_3C6C6E823FD73900 (pere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, user_id INT NOT NULL, for_when TIME NOT NULL, duration INT NOT NULL, date TIME NOT NULL, INDEX IDX_4DA2397294869C (article_id), INDEX IDX_4DA239A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, available_times LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_7332E1697294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lexique ADD CONSTRAINT FK_3C6C6E823FD73900 FOREIGN KEY (pere_id) REFERENCES lexique (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2397294869C FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES membres (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E1697294869C FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316879F37AE5');
        $this->addSql('DROP INDEX IDX_BFDD316879F37AE5 ON articles');
        $this->addSql('ALTER TABLE articles CHANGE user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316879F37AE5 FOREIGN KEY (id_user_id) REFERENCES membres (id)');
        $this->addSql('CREATE INDEX IDX_BFDD316879F37AE5 ON articles (id_user_id)');
        $this->addSql('ALTER TABLE biens DROP FOREIGN KEY FK_1F9004DDD71E064B');
        $this->addSql('ALTER TABLE biens DROP PRIMARY KEY');
        $this->addSql('DROP INDEX UNIQ_1F9004DDD71E064B ON biens');
        $this->addSql('ALTER TABLE biens ADD id INT AUTO_INCREMENT NOT NULL, CHANGE article_id id_article_id INT NOT NULL');
        $this->addSql('ALTER TABLE biens ADD CONSTRAINT FK_1F9004DDD71E064B FOREIGN KEY (id_article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE biens ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F9004DDD71E064B ON biens (id_article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lexique DROP FOREIGN KEY FK_3C6C6E823FD73900');
        $this->addSql('DROP TABLE lexique');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE services');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316879F37AE5');
        $this->addSql('DROP INDEX IDX_BFDD316879F37AE5 ON articles');
        $this->addSql('ALTER TABLE articles CHANGE id_user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316879F37AE5 FOREIGN KEY (user_id) REFERENCES membres (id)');
        $this->addSql('CREATE INDEX IDX_BFDD316879F37AE5 ON articles (user_id)');
        $this->addSql('ALTER TABLE biens MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE biens DROP FOREIGN KEY FK_1F9004DDD71E064B');
        $this->addSql('DROP INDEX UNIQ_1F9004DDD71E064B ON biens');
        $this->addSql('ALTER TABLE biens DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE biens DROP id, CHANGE id_article_id article_id INT NOT NULL');
        $this->addSql('ALTER TABLE biens ADD CONSTRAINT FK_1F9004DDD71E064B FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F9004DDD71E064B ON biens (article_id)');
        $this->addSql('ALTER TABLE biens ADD PRIMARY KEY (article_id)');
    }
}
