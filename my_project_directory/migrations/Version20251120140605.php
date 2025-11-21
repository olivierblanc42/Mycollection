<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251120140605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_character (item_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_9FA0A6C4126F525E (item_id), INDEX IDX_9FA0A6C41136BE75 (character_id), PRIMARY KEY(item_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_character ADD CONSTRAINT FK_9FA0A6C4126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_character ADD CONSTRAINT FK_9FA0A6C41136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item ADD category_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL, ADD expansion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E5C15249D FOREIGN KEY (expansion_id) REFERENCES expansion (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E12469DE2 ON item (category_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251EC54C8C93 ON item (type_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E5C15249D ON item (expansion_id)');
        $this->addSql('ALTER TABLE item_picture ADD item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item_picture ADD CONSTRAINT FK_1D8669DD126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_1D8669DD126F525E ON item_picture (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_character DROP FOREIGN KEY FK_9FA0A6C4126F525E');
        $this->addSql('ALTER TABLE item_character DROP FOREIGN KEY FK_9FA0A6C41136BE75');
        $this->addSql('DROP TABLE item_character');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E12469DE2');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EC54C8C93');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E5C15249D');
        $this->addSql('DROP INDEX IDX_1F1B251E12469DE2 ON item');
        $this->addSql('DROP INDEX IDX_1F1B251EC54C8C93 ON item');
        $this->addSql('DROP INDEX IDX_1F1B251E5C15249D ON item');
        $this->addSql('ALTER TABLE item DROP category_id, DROP type_id, DROP expansion_id');
        $this->addSql('ALTER TABLE item_picture DROP FOREIGN KEY FK_1D8669DD126F525E');
        $this->addSql('DROP INDEX IDX_1D8669DD126F525E ON item_picture');
        $this->addSql('ALTER TABLE item_picture DROP item_id');
    }
}
