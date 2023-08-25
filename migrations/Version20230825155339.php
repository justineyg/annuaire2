<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230825155339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_sector (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, promotion_id INT NOT NULL, year_of_promotion_id INT NOT NULL, name VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, biography LONGTEXT DEFAULT NULL, email VARCHAR(180) NOT NULL, INDEX IDX_E6D6B297139DF194 (promotion_id), INDEX IDX_E6D6B297B71422C2 (year_of_promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year_of_promotion (id INT AUTO_INCREMENT NOT NULL, year DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297B71422C2 FOREIGN KEY (year_of_promotion_id) REFERENCES year_of_promotion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297139DF194');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297B71422C2');
        $this->addSql('DROP TABLE business_sector');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE year_of_promotion');
    }
}
