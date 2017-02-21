<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170221222353 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_categories RENAME INDEX uniq_3af34668989d9b62 TO UNIQ_62A97E9989D9B62');
        $this->addSql('ALTER TABLE article_categories RENAME INDEX idx_3af3466879066886 TO IDX_62A97E979066886');
        $this->addSql('ALTER TABLE article_categories RENAME INDEX idx_3af34668727aca70 TO IDX_62A97E9727ACA70');
        $this->addSql('ALTER TABLE articles CHANGE perex perex LONGTEXT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_categories RENAME INDEX uniq_62a97e9989d9b62 TO UNIQ_3AF34668989D9B62');
        $this->addSql('ALTER TABLE article_categories RENAME INDEX idx_62a97e979066886 TO IDX_3AF3466879066886');
        $this->addSql('ALTER TABLE article_categories RENAME INDEX idx_62a97e9727aca70 TO IDX_3AF34668727ACA70');
        $this->addSql('ALTER TABLE articles CHANGE perex perex LONGTEXT NOT NULL COLLATE utf8_unicode_ci');
    }
}
