<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419120749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE courseskill (id INT IDENTITY NOT NULL, name NVARCHAR(30) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE coursevalue (id INT IDENTITY NOT NULL, name NVARCHAR(30) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE honors (id INT IDENTITY NOT NULL, name NVARCHAR(50) NOT NULL, maxscore DOUBLE PRECISION NOT NULL, minscore DOUBLE PRECISION NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE speciality (id INT IDENTITY NOT NULL, name NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
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
        $this->addSql('DROP TABLE courseskill');
        $this->addSql('DROP TABLE coursevalue');
        $this->addSql('DROP TABLE honors');
        $this->addSql('DROP TABLE speciality');
    }
}
