<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200419211358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entity (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geographical_entity (id INT AUTO_INCREMENT NOT NULL, parent_geographical_entity_id INT DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, INDEX IDX_159448DE1AA98133 (parent_geographical_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE named_entity (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistical_entity (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, name VARCHAR(255) NOT NULL, tag LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE value (id INT AUTO_INCREMENT NOT NULL, statistical_entity_id INT NOT NULL, geographical_entity_id INT DEFAULT NULL, created DATETIME NOT NULL, value DOUBLE PRECISION NOT NULL, timestamp DATETIME NOT NULL, source_url VARCHAR(4000) DEFAULT NULL, source_description VARCHAR(4000) DEFAULT NULL, INDEX IDX_1D775834D233E946 (statistical_entity_id), INDEX IDX_1D7758342E944F4F (geographical_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE geographical_entity ADD CONSTRAINT FK_159448DE1AA98133 FOREIGN KEY (parent_geographical_entity_id) REFERENCES geographical_entity (id)');
        $this->addSql('ALTER TABLE value ADD CONSTRAINT FK_1D775834D233E946 FOREIGN KEY (statistical_entity_id) REFERENCES statistical_entity (id)');
        $this->addSql('ALTER TABLE value ADD CONSTRAINT FK_1D7758342E944F4F FOREIGN KEY (geographical_entity_id) REFERENCES geographical_entity (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE geographical_entity DROP FOREIGN KEY FK_159448DE1AA98133');
        $this->addSql('ALTER TABLE value DROP FOREIGN KEY FK_1D7758342E944F4F');
        $this->addSql('ALTER TABLE value DROP FOREIGN KEY FK_1D775834D233E946');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE geographical_entity');
        $this->addSql('DROP TABLE named_entity');
        $this->addSql('DROP TABLE statistical_entity');
        $this->addSql('DROP TABLE value');
    }
}
