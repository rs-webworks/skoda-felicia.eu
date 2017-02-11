<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170210163039 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE downloads (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, `desc` LONGTEXT NOT NULL, image_name VARCHAR(255) NOT NULL, position INT NOT NULL, slug VARCHAR(128) NOT NULL, click_count INT NOT NULL, UNIQUE INDEX UNIQ_4B73A4B5989D9B62 (slug), INDEX IDX_4B73A4B512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE download_categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, position INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE downloads ADD CONSTRAINT FK_4B73A4B512469DE2 FOREIGN KEY (category_id) REFERENCES download_categories (id)');
        $this->addSql('ALTER TABLE manual_categories ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE manual_pages CHANGE category_id category_id INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE downloads DROP FOREIGN KEY FK_4B73A4B512469DE2');
        $this->addSql('DROP TABLE downloads');
        $this->addSql('DROP TABLE download_categories');
        $this->addSql('DROP INDEX UNIQ_321EBCA7989D9B62 ON manual_categories');
        $this->addSql('ALTER TABLE manual_categories DROP slug');
        $this->addSql('ALTER TABLE manual_pages CHANGE category_id category_id INT NOT NULL');
    }
}
