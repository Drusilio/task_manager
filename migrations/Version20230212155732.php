<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212155732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, task_id INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_9474526C8DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsible_person (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, responsible_person_id INT DEFAULT NULL, description LONGTEXT NOT NULL, deadline DATETIME NOT NULL, status TINYINT(1) NOT NULL, file LONGTEXT NOT NULL, completion_date DATETIME DEFAULT NULL, INDEX IDX_527EDB25EF64F467 (responsible_person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25EF64F467 FOREIGN KEY (responsible_person_id) REFERENCES responsible_person (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25EF64F467');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C8DB60186');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE responsible_person');
        $this->addSql('DROP TABLE task');
    }
}
