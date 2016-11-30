<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161121202501 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) NOT NULL, object_class VARCHAR(255) NOT NULL, field VARCHAR(32) NOT NULL, foreign_key VARCHAR(64) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX translations_lookup_idx (locale, object_class, foreign_key), UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ext_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(8) NOT NULL, logged_at DATETIME NOT NULL, object_id VARCHAR(64) DEFAULT NULL, object_class VARCHAR(255) NOT NULL, version INT NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL, INDEX log_class_lookup_idx (object_class), INDEX log_date_lookup_idx (logged_at), INDEX log_user_lookup_idx (username), INDEX log_version_lookup_idx (object_id, object_class, version), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engines (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(5) NOT NULL, description VARCHAR(50) NOT NULL, slug VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_88EF988C989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reports (id INT AUTO_INCREMENT NOT NULL, manual_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, ip VARCHAR(50) NOT NULL, sent DATETIME NOT NULL, resolved TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_F11FA7459BA073D6 (manual_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manual_images (id INT AUTO_INCREMENT NOT NULL, manual_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, position INT NOT NULL, INDEX IDX_AF8289A39BA073D6 (manual_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manual_pages (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, position INT NOT NULL, slug VARCHAR(128) NOT NULL, full_width TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_62B17ED6989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `manual_pages` ADD FULLTEXT `fulltext_index` (`content`, `title`);');
        $this->addSql('CREATE TABLE manuals_engines (manual_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_3AE78ED39BA073D6 (manual_id), INDEX IDX_3AE78ED3E78C9C0A (engine_id), PRIMARY KEY(manual_id, engine_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reports ADD CONSTRAINT FK_F11FA7459BA073D6 FOREIGN KEY (manual_id) REFERENCES manual_pages (id)');
        $this->addSql('ALTER TABLE manual_images ADD CONSTRAINT FK_AF8289A39BA073D6 FOREIGN KEY (manual_id) REFERENCES manual_pages (id)');
        $this->addSql('ALTER TABLE manuals_engines ADD CONSTRAINT FK_3AE78ED39BA073D6 FOREIGN KEY (manual_id) REFERENCES manual_pages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manuals_engines ADD CONSTRAINT FK_3AE78ED3E78C9C0A FOREIGN KEY (engine_id) REFERENCES engines (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE manuals_engines DROP FOREIGN KEY FK_3AE78ED3E78C9C0A');
        $this->addSql('ALTER TABLE reports DROP FOREIGN KEY FK_F11FA7459BA073D6');
        $this->addSql('ALTER TABLE manual_images DROP FOREIGN KEY FK_AF8289A39BA073D6');
        $this->addSql('ALTER TABLE manuals_engines DROP FOREIGN KEY FK_3AE78ED39BA073D6');
        $this->addSql('DROP TABLE ext_translations');
        $this->addSql('DROP TABLE ext_log_entries');
        $this->addSql('DROP TABLE engines');
        $this->addSql('DROP TABLE reports');
        $this->addSql('DROP TABLE manual_images');
        $this->addSql('DROP TABLE manual_pages');
        $this->addSql('DROP TABLE manuals_engines');
    }
}
