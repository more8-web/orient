<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720141452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, content_alias VARCHAR(255) NOT NULL, content_description VARCHAR(255) DEFAULT NULL, content_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_category (id INT AUTO_INCREMENT NOT NULL, content_category_parent_id INT NOT NULL, content_category_alias VARCHAR(255) NOT NULL, UNIQUE INDEX category_unique (content_category_parent_id, content_category_alias), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_content_category (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, content_category_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_html_tag (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, html_tag_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_keyword (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, keyword_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_to_news (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keyword (id INT AUTO_INCREMENT NOT NULL, keyword_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, news_alias VARCHAR(255) NOT NULL, news_status VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_to_news_category (news_id INT NOT NULL, news_category_id INT NOT NULL, INDEX IDX_449FD782B5A459A0 (news_id), INDEX IDX_449FD7823B732BAD (news_category_id), PRIMARY KEY(news_id, news_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_category (id INT AUTO_INCREMENT NOT NULL, news_category_parent_id INT DEFAULT NULL, news_category_alias VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_log (id INT AUTO_INCREMENT NOT NULL, news_log_id INT NOT NULL, user_id INT NOT NULL, news_log_comment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_to_keyword (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(128) NOT NULL, salt VARCHAR(64) NOT NULL, confirmation_code VARCHAR(255) DEFAULT NULL, roles VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, last_login_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_to_news_category ADD CONSTRAINT FK_449FD782B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_to_news_category ADD CONSTRAINT FK_449FD7823B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news_to_news_category DROP FOREIGN KEY FK_449FD782B5A459A0');
        $this->addSql('ALTER TABLE news_to_news_category DROP FOREIGN KEY FK_449FD7823B732BAD');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE content_category');
        $this->addSql('DROP TABLE content_to_content_category');
        $this->addSql('DROP TABLE content_to_html_tag');
        $this->addSql('DROP TABLE content_to_keyword');
        $this->addSql('DROP TABLE content_to_news');
        $this->addSql('DROP TABLE keyword');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_to_news_category');
        $this->addSql('DROP TABLE news_category');
        $this->addSql('DROP TABLE news_log');
        $this->addSql('DROP TABLE news_to_keyword');
        $this->addSql('DROP TABLE user');
    }
}
