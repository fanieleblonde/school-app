<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425093648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE current_session (id INT IDENTITY NOT NULL, session_id INT NOT NULL, institution_id INT NOT NULL, begenningdate DATE NOT NULL, endingdate DATE NOT NULL, number_of_exam INT, skills NVARCHAR(50), status NVARCHAR(30) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_7A495051613FECDF ON current_session (session_id)');
        $this->addSql('CREATE INDEX IDX_7A49505110405986 ON current_session (institution_id)');
        $this->addSql('ALTER TABLE current_session ADD CONSTRAINT FK_7A495051613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE current_session ADD CONSTRAINT FK_7A49505110405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
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
        $this->addSql('ALTER TABLE current_session DROP CONSTRAINT FK_7A495051613FECDF');
        $this->addSql('ALTER TABLE current_session DROP CONSTRAINT FK_7A49505110405986');
        $this->addSql('DROP TABLE current_session');
    }
}
