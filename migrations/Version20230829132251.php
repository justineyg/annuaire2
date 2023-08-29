<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829132251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE year_of_promotion ADD promotion_id INT NOT NULL');
        $this->addSql('ALTER TABLE year_of_promotion ADD CONSTRAINT FK_DC67FB9D139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DC67FB9D139DF194 ON year_of_promotion (promotion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE year_of_promotion DROP FOREIGN KEY FK_DC67FB9D139DF194');
        $this->addSql('DROP INDEX UNIQ_DC67FB9D139DF194 ON year_of_promotion');
        $this->addSql('ALTER TABLE year_of_promotion DROP promotion_id');
    }
}
