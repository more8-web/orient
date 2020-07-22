<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720165914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE keyword_to_content (content_id INT NOT NULL, keyword_id INT NOT NULL, INDEX IDX_36284E2F84A0A3ED (content_id), INDEX IDX_36284E2F115D4552 (keyword_id), PRIMARY KEY(content_id, keyword_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE keyword_to_content ADD CONSTRAINT FK_36284E2F84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keyword_to_content ADD CONSTRAINT FK_36284E2F115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE keyword_to_content');
    }
}
