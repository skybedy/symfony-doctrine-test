<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307094618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE osoby1 (id INT AUTO_INCREMENT NOT NULL, tym_id INT NOT NULL, jmeno VARCHAR(255) NOT NULL, prijmeni VARCHAR(255) NOT NULL, INDEX IDX_7127BCAD85FF5F36 (tym_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE osoby1 ADD CONSTRAINT FK_7127BCAD85FF5F36 FOREIGN KEY (tym_id) REFERENCES tymy (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE osoby1');
        $this->addSql('ALTER TABLE osoby CHANGE jmeno jmeno VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prijmeni prijmeni VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tymy CHANGE nazev_tymu nazev_tymu VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
