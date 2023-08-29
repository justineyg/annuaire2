<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829153837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil ADD business_sector_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297C7F1CE18 FOREIGN KEY (business_sector_id) REFERENCES business_sector (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B297C7F1CE18 ON profil (business_sector_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297C7F1CE18');
        $this->addSql('DROP INDEX IDX_E6D6B297C7F1CE18 ON profil');
        $this->addSql('ALTER TABLE profil DROP business_sector_id');
    }
}
