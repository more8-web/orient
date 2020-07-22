<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720161817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_to_content_category (content_id INT NOT NULL, content_category_id INT NOT NULL, INDEX IDX_C1C4ED9284A0A3ED (content_id), INDEX IDX_C1C4ED92416C3764 (content_category_id), PRIMARY KEY(content_id, content_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_to_content_category ADD CONSTRAINT FK_C1C4ED9284A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_to_content_category ADD CONSTRAINT FK_C1C4ED92416C3764 FOREIGN KEY (content_category_id) REFERENCES content_category (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX category_unique ON content_category');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_to_content_category');
        $this->addSql('CREATE UNIQUE INDEX category_unique ON content_category (content_category_parent_id, content_category_alias)');
    }
}
