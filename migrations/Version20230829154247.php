<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829154247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD year_id INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD140C1FEA7 FOREIGN KEY (year_id) REFERENCES year_of_promotion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C11D7DD140C1FEA7 ON promotion (year_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP created_at, DROP email');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD140C1FEA7');
        $this->addSql('DROP INDEX UNIQ_C11D7DD140C1FEA7 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP year_id');
    }
}
