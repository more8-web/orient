<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722103707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE html_tag (id INT AUTO_INCREMENT NOT NULL, html_tag_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_html_tag (html_tag_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_677653DA8AD76B98 (html_tag_id), INDEX IDX_677653DA84A0A3ED (content_id), PRIMARY KEY(html_tag_id, content_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_to_html_tag ADD CONSTRAINT FK_677653DA8AD76B98 FOREIGN KEY (html_tag_id) REFERENCES html_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_to_html_tag ADD CONSTRAINT FK_677653DA84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_to_html_tag DROP FOREIGN KEY FK_677653DA8AD76B98');
        $this->addSql('DROP TABLE html_tag');
        $this->addSql('DROP TABLE content_to_html_tag');
    }
}
