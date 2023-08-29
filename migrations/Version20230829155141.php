<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829155141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil ADD profession_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297FDEF8996 FOREIGN KEY (profession_id) REFERENCES business_sector (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B297FDEF8996 ON profil (profession_id)');
        $this->addSql('ALTER TABLE year_of_promotion ADD name_id INT NOT NULL');
        $this->addSql('ALTER TABLE year_of_promotion ADD CONSTRAINT FK_DC67FB9D71179CD6 FOREIGN KEY (name_id) REFERENCES promotion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DC67FB9D71179CD6 ON year_of_promotion (name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297FDEF8996');
        $this->addSql('DROP INDEX IDX_E6D6B297FDEF8996 ON profil');
        $this->addSql('ALTER TABLE profil DROP profession_id');
        $this->addSql('ALTER TABLE year_of_promotion DROP FOREIGN KEY FK_DC67FB9D71179CD6');
        $this->addSql('DROP INDEX UNIQ_DC67FB9D71179CD6 ON year_of_promotion');
        $this->addSql('ALTER TABLE year_of_promotion DROP name_id');
    }
}
