<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424092110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE degree (id INT IDENTITY NOT NULL, degree_type_id INT NOT NULL, code NVARCHAR(30) NOT NULL, name NVARCHAR(30) NOT NULL, minyear INT NOT NULL, maxyear INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_A7A36D63588EC755 ON degree (degree_type_id)');
        $this->addSql('ALTER TABLE degree ADD CONSTRAINT FK_A7A36D63588EC755 FOREIGN KEY (degree_type_id) REFERENCES degree_type (id)');
        $this->addSql('ALTER TABLE periodicity_name ALTER COLUMN value INT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE degree DROP CONSTRAINT FK_A7A36D63588EC755');
        $this->addSql('DROP TABLE degree');
        $this->addSql('ALTER TABLE periodicity_name ALTER COLUMN value NVARCHAR(10)');
    }
}
