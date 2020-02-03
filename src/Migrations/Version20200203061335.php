<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200203061335 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task CHANGE task_categorie_id task_categorie_id INT DEFAULT NULL, CHANGE section_id section_id INT DEFAULT NULL, CHANGE url_doc url_doc VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD section_owner_id INT DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EE513BA5 FOREIGN KEY (section_owner_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649EE513BA5 ON user (section_owner_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task CHANGE task_categorie_id task_categorie_id INT DEFAULT NULL, CHANGE section_id section_id INT DEFAULT NULL, CHANGE url_doc url_doc VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EE513BA5');
        $this->addSql('DROP INDEX IDX_8D93D649EE513BA5 ON user');
        $this->addSql('ALTER TABLE user DROP section_owner_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`');
    }
}
