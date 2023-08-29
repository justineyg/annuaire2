<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829153413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_sector (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year_of_promotion (id INT AUTO_INCREMENT NOT NULL, year DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil ADD promotion_id INT NOT NULL, ADD year_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29740C1FEA7 FOREIGN KEY (year_id) REFERENCES year_of_promotion (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B297139DF194 ON profil (promotion_id)');
        $this->addSql('CREATE INDEX IDX_E6D6B29740C1FEA7 ON profil (year_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297139DF194');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29740C1FEA7');
        $this->addSql('DROP TABLE business_sector');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE year_of_promotion');
        $this->addSql('DROP INDEX IDX_E6D6B297139DF194 ON profil');
        $this->addSql('DROP INDEX IDX_E6D6B29740C1FEA7 ON profil');
        $this->addSql('ALTER TABLE profil DROP promotion_id, DROP year_id');
    }
}
