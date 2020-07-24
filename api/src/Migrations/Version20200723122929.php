<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723122929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE log_to_news (news_id INT NOT NULL, log_id INT NOT NULL, INDEX IDX_C2F0B008B5A459A0 (news_id), INDEX IDX_C2F0B008EA675D86 (log_id), PRIMARY KEY(news_id, log_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE log_to_news ADD CONSTRAINT FK_C2F0B008B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE log_to_news ADD CONSTRAINT FK_C2F0B008EA675D86 FOREIGN KEY (log_id) REFERENCES log (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE log_to_news');
    }
}
