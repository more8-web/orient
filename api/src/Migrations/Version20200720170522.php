<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720170522 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_to_news (news_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_2535512CB5A459A0 (news_id), INDEX IDX_2535512C84A0A3ED (content_id), PRIMARY KEY(news_id, content_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_to_news ADD CONSTRAINT FK_2535512CB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_to_news ADD CONSTRAINT FK_2535512C84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_to_news');
    }
}
