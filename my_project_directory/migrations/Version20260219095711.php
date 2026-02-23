<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260219095711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expansion (id INT AUTO_INCREMENT NOT NULL, tcg_id INT DEFAULT NULL, label VARCHAR(50) NOT NULL, creation_date DATE NOT NULL, descritpion VARCHAR(1000) NOT NULL, INDEX IDX_F0695B72C0123071 (tcg_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expansion ADD CONSTRAINT FK_F0695B72C0123071 FOREIGN KEY (tcg_id) REFERENCES tcg (id)');
        $this->addSql('DROP TABLE expension');
        $this->addSql('ALTER TABLE card_tcg ADD expension_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE card_tcg ADD CONSTRAINT FK_614F51C01F97591 FOREIGN KEY (expension_id) REFERENCES expansion (id)');
        $this->addSql('CREATE INDEX IDX_614F51C01F97591 ON card_tcg (expension_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_tcg DROP FOREIGN KEY FK_614F51C01F97591');
        $this->addSql('CREATE TABLE expension (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, creation_date DATE NOT NULL, descritpion VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE expansion DROP FOREIGN KEY FK_F0695B72C0123071');
        $this->addSql('DROP TABLE expansion');
        $this->addSql('DROP INDEX IDX_614F51C01F97591 ON card_tcg');
        $this->addSql('ALTER TABLE card_tcg DROP expension_id');
    }
}
