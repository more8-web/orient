<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720170928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news_to_keyword MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE news_to_keyword DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE news_to_keyword ADD keyword_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE news_to_keyword ADD CONSTRAINT FK_38749BB7B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_to_keyword ADD CONSTRAINT FK_38749BB7115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_38749BB7B5A459A0 ON news_to_keyword (news_id)');
        $this->addSql('CREATE INDEX IDX_38749BB7115D4552 ON news_to_keyword (keyword_id)');
        $this->addSql('ALTER TABLE news_to_keyword ADD PRIMARY KEY (news_id, keyword_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news_to_keyword DROP FOREIGN KEY FK_38749BB7B5A459A0');
        $this->addSql('ALTER TABLE news_to_keyword DROP FOREIGN KEY FK_38749BB7115D4552');
        $this->addSql('DROP INDEX IDX_38749BB7B5A459A0 ON news_to_keyword');
        $this->addSql('DROP INDEX IDX_38749BB7115D4552 ON news_to_keyword');
        $this->addSql('ALTER TABLE news_to_keyword ADD id INT AUTO_INCREMENT NOT NULL, DROP keyword_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
