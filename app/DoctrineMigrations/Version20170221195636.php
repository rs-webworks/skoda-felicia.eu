<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170221195636 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article_reports (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, ip VARCHAR(50) NOT NULL, sent DATETIME NOT NULL, resolved TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_1CCDE3F27294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_categories (id INT AUTO_INCREMENT NOT NULL, root_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, position INT NOT NULL, icon VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, lft INT NOT NULL, lvl INT NOT NULL, rgt INT NOT NULL, UNIQUE INDEX UNIQ_3AF34668989D9B62 (slug), INDEX IDX_3AF3466879066886 (root_id), INDEX IDX_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, perex LONGTEXT NOT NULL, content LONGTEXT NOT NULL, position INT NOT NULL, slug VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, published TINYINT(1) NOT NULL, author LONGTEXT NOT NULL, image_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BFDD3168989D9B62 (slug), INDEX IDX_BFDD316812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_reports ADD CONSTRAINT FK_1CCDE3F27294869C FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE article_categories ADD CONSTRAINT FK_3AF3466879066886 FOREIGN KEY (root_id) REFERENCES article_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES article_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316812469DE2 FOREIGN KEY (category_id) REFERENCES article_categories (id)');
        $this->addSql('ALTER TABLE `articles` ADD FULLTEXT `fulltext_index` (`content`, `title`, `perex`);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_categories DROP FOREIGN KEY FK_3AF3466879066886');
        $this->addSql('ALTER TABLE article_categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316812469DE2');
        $this->addSql('ALTER TABLE article_reports DROP FOREIGN KEY FK_1CCDE3F27294869C');
        $this->addSql('DROP TABLE article_reports');
        $this->addSql('DROP TABLE article_categories');
        $this->addSql('DROP TABLE articles');
    }
}
