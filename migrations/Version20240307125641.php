<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307125641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shirts ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE shirts ADD CONSTRAINT FK_6327A8312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_6327A8312469DE2 ON shirts (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shirts DROP FOREIGN KEY FK_6327A8312469DE2');
        $this->addSql('DROP INDEX IDX_6327A8312469DE2 ON shirts');
        $this->addSql('ALTER TABLE shirts DROP category_id');
    }
}