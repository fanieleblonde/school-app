<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426125638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE department_degree (id INT IDENTITY NOT NULL, degree_id INT NOT NULL, department_id INT NOT NULL, school_id INT NOT NULL, currentsession_id INT NOT NULL, graduatelevel NVARCHAR(30) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_B3B99293B35C5756 ON department_degree (degree_id)');
        $this->addSql('CREATE INDEX IDX_B3B99293AE80F5DF ON department_degree (department_id)');
        $this->addSql('CREATE INDEX IDX_B3B99293C32A47EE ON department_degree (school_id)');
        $this->addSql('CREATE INDEX IDX_B3B99293F785FC6E ON department_degree (currentsession_id)');
        $this->addSql('ALTER TABLE department_degree ADD CONSTRAINT FK_B3B99293B35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id)');
        $this->addSql('ALTER TABLE department_degree ADD CONSTRAINT FK_B3B99293AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE department_degree ADD CONSTRAINT FK_B3B99293C32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE department_degree ADD CONSTRAINT FK_B3B99293F785FC6E FOREIGN KEY (currentsession_id) REFERENCES current_session (id)');
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
        $this->addSql('ALTER TABLE department_degree DROP CONSTRAINT FK_B3B99293B35C5756');
        $this->addSql('ALTER TABLE department_degree DROP CONSTRAINT FK_B3B99293AE80F5DF');
        $this->addSql('ALTER TABLE department_degree DROP CONSTRAINT FK_B3B99293C32A47EE');
        $this->addSql('ALTER TABLE department_degree DROP CONSTRAINT FK_B3B99293F785FC6E');
        $this->addSql('DROP TABLE department_degree');
    }
}
