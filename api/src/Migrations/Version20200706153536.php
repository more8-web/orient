<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706153536 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_categories (id INT AUTO_INCREMENT NOT NULL, content_category_id INT NOT NULL, content_category_parent_id INT NOT NULL, content_category_alias VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_content_category (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, content_category_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_html_tag (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, html_tag_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_keyword (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, keyword_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_news (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contents (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, content_alias VARCHAR(255) NOT NULL, content_description VARCHAR(255) DEFAULT NULL, content_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, keyword_id INT NOT NULL, keyword_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_log (id INT AUTO_INCREMENT NOT NULL, news_log_id INT NOT NULL, user_id INT NOT NULL, news_log_comment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_to_keyword (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_to_news_category (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_categories');
        $this->addSql('DROP TABLE content_to_content_category');
        $this->addSql('DROP TABLE content_to_html_tag');
        $this->addSql('DROP TABLE content_to_keyword');
        $this->addSql('DROP TABLE content_to_news');
        $this->addSql('DROP TABLE contents');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE news_log');
        $this->addSql('DROP TABLE news_to_keyword');
        $this->addSql('DROP TABLE news_to_news_category');
    }
}
