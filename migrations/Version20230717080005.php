<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717080005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, is_from_id INT DEFAULT NULL, publish_id INT DEFAULT NULL, title VARCHAR(64) NOT NULL, overview VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, published_date DATETIME NOT NULL, INDEX IDX_23A0E666EF25FC3 (is_from_id), INDEX IDX_23A0E668734ED60 (publish_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sticker (id INT AUTO_INCREMENT NOT NULL, craft_id INT DEFAULT NULL, is_about_id INT DEFAULT NULL, INDEX IDX_8FEDBCFDE836CCC8 (craft_id), INDEX IDX_8FEDBCFD452EAD5D (is_about_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sticker_sticker_item (sticker_id INT NOT NULL, sticker_item_id INT NOT NULL, INDEX IDX_35BD04B14D965A4D (sticker_id), INDEX IDX_35BD04B17CF0B873 (sticker_item_id), PRIMARY KEY(sticker_id, sticker_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sticker_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sticker_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE todolist (id INT AUTO_INCREMENT NOT NULL, make_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, listing LONGTEXT DEFAULT NULL, INDEX IDX_DD4DF6DBCFBF73EB (make_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666EF25FC3 FOREIGN KEY (is_from_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E668734ED60 FOREIGN KEY (publish_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sticker ADD CONSTRAINT FK_8FEDBCFDE836CCC8 FOREIGN KEY (craft_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sticker ADD CONSTRAINT FK_8FEDBCFD452EAD5D FOREIGN KEY (is_about_id) REFERENCES sticker_category (id)');
        $this->addSql('ALTER TABLE sticker_sticker_item ADD CONSTRAINT FK_35BD04B14D965A4D FOREIGN KEY (sticker_id) REFERENCES sticker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sticker_sticker_item ADD CONSTRAINT FK_35BD04B17CF0B873 FOREIGN KEY (sticker_item_id) REFERENCES sticker_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE todolist ADD CONSTRAINT FK_DD4DF6DBCFBF73EB FOREIGN KEY (make_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666EF25FC3');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E668734ED60');
        $this->addSql('ALTER TABLE sticker DROP FOREIGN KEY FK_8FEDBCFDE836CCC8');
        $this->addSql('ALTER TABLE sticker DROP FOREIGN KEY FK_8FEDBCFD452EAD5D');
        $this->addSql('ALTER TABLE sticker_sticker_item DROP FOREIGN KEY FK_35BD04B14D965A4D');
        $this->addSql('ALTER TABLE sticker_sticker_item DROP FOREIGN KEY FK_35BD04B17CF0B873');
        $this->addSql('ALTER TABLE todolist DROP FOREIGN KEY FK_DD4DF6DBCFBF73EB');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE sticker');
        $this->addSql('DROP TABLE sticker_sticker_item');
        $this->addSql('DROP TABLE sticker_category');
        $this->addSql('DROP TABLE sticker_item');
        $this->addSql('DROP TABLE todolist');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
