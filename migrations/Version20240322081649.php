<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240322081649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD shirts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989835A013 FOREIGN KEY (shirts_id) REFERENCES shirts (id)');
        $this->addSql('CREATE INDEX IDX_F52993989835A013 ON `order` (shirts_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989835A013');
        $this->addSql('DROP INDEX IDX_F52993989835A013 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP shirts_id');
    }
}
