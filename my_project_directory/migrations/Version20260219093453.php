<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260219093453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expension (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, creation_date DATE NOT NULL, descritpion VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card_tcg CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE card_tcg ADD CONSTRAINT FK_614F51C0BF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE expension');
        $this->addSql('ALTER TABLE card_tcg DROP FOREIGN KEY FK_614F51C0BF396750');
        $this->addSql('ALTER TABLE card_tcg CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
