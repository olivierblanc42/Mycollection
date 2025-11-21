<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251119103412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_item_license (item_id INT NOT NULL, item_license_id INT NOT NULL, INDEX IDX_936F2F8C126F525E (item_id), INDEX IDX_936F2F8CFBBEB841 (item_license_id), PRIMARY KEY(item_id, item_license_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_illustrator (item_id INT NOT NULL, illustrator_id INT NOT NULL, INDEX IDX_77674981126F525E (item_id), INDEX IDX_77674981653613B3 (illustrator_id), PRIMARY KEY(item_id, illustrator_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network (id INT AUTO_INCREMENT NOT NULL, platform VARCHAR(100) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_item (user_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_659A69D7A76ED395 (user_id), INDEX IDX_659A69D7126F525E (item_id), PRIMARY KEY(user_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_item_license ADD CONSTRAINT FK_936F2F8C126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_item_license ADD CONSTRAINT FK_936F2F8CFBBEB841 FOREIGN KEY (item_license_id) REFERENCES item_license (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_illustrator ADD CONSTRAINT FK_77674981126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_illustrator ADD CONSTRAINT FK_77674981653613B3 FOREIGN KEY (illustrator_id) REFERENCES illustrator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_item ADD CONSTRAINT FK_659A69D7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_item ADD CONSTRAINT FK_659A69D7126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE illustrator_social_media');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE illustrator_social_media (id INT AUTO_INCREMENT NOT NULL, platform VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE item_item_license DROP FOREIGN KEY FK_936F2F8C126F525E');
        $this->addSql('ALTER TABLE item_item_license DROP FOREIGN KEY FK_936F2F8CFBBEB841');
        $this->addSql('ALTER TABLE item_illustrator DROP FOREIGN KEY FK_77674981126F525E');
        $this->addSql('ALTER TABLE item_illustrator DROP FOREIGN KEY FK_77674981653613B3');
        $this->addSql('ALTER TABLE user_item DROP FOREIGN KEY FK_659A69D7A76ED395');
        $this->addSql('ALTER TABLE user_item DROP FOREIGN KEY FK_659A69D7126F525E');
        $this->addSql('DROP TABLE item_item_license');
        $this->addSql('DROP TABLE item_illustrator');
        $this->addSql('DROP TABLE network');
        $this->addSql('DROP TABLE user_item');
    }
}
