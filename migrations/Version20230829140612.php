<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829140612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, promotion_id INT NOT NULL, year_id INT NOT NULL, business_sector_id INT NOT NULL, firstname VARCHAR(180) NOT NULL, lastname VARCHAR(180) NOT NULL, biography LONGTEXT DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E6D6B297139DF194 (promotion_id), INDEX IDX_E6D6B29740C1FEA7 (year_id), INDEX IDX_E6D6B297C7F1CE18 (business_sector_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year_of_promotion (id INT AUTO_INCREMENT NOT NULL, year DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29740C1FEA7 FOREIGN KEY (year_id) REFERENCES year_of_promotion (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297C7F1CE18 FOREIGN KEY (business_sector_id) REFERENCES business_sector (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297139DF194');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29740C1FEA7');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297C7F1CE18');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE year_of_promotion');
    }
}
