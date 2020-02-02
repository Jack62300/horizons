<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200201125905 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task ADD task_categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB257464C300 FOREIGN KEY (task_categorie_id) REFERENCES task_categorie (id)');
        $this->addSql('CREATE INDEX IDX_527EDB257464C300 ON task (task_categorie_id)');
        $this->addSql('ALTER TABLE task_categorie DROP FOREIGN KEY FK_36571B658DB60186');
        $this->addSql('DROP INDEX IDX_36571B658DB60186 ON task_categorie');
        $this->addSql('ALTER TABLE task_categorie DROP task_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB257464C300');
        $this->addSql('DROP INDEX IDX_527EDB257464C300 ON task');
        $this->addSql('ALTER TABLE task DROP task_categorie_id');
        $this->addSql('ALTER TABLE task_categorie ADD task_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task_categorie ADD CONSTRAINT FK_36571B658DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('CREATE INDEX IDX_36571B658DB60186 ON task_categorie (task_id)');
    }
}
