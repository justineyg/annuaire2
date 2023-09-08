<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230906161112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29740C1FEA7');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD140C1FEA7');
        $this->addSql('ALTER TABLE year_of_promotion DROP FOREIGN KEY FK_DC67FB9D71179CD6');
        $this->addSql('DROP TABLE year_of_promotion');
        $this->addSql('DROP INDEX IDX_E6D6B29740C1FEA7 ON profil');
        $this->addSql('ALTER TABLE profil DROP year_id');
        $this->addSql('DROP INDEX UNIQ_C11D7DD140C1FEA7 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP year_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE year_of_promotion (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, year DATE NOT NULL, UNIQUE INDEX UNIQ_DC67FB9D71179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE year_of_promotion ADD CONSTRAINT FK_DC67FB9D71179CD6 FOREIGN KEY (name_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE profil ADD year_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29740C1FEA7 FOREIGN KEY (year_id) REFERENCES year_of_promotion (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B29740C1FEA7 ON profil (year_id)');
        $this->addSql('ALTER TABLE promotion ADD year_id INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD140C1FEA7 FOREIGN KEY (year_id) REFERENCES year_of_promotion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C11D7DD140C1FEA7 ON promotion (year_id)');
    }
}
