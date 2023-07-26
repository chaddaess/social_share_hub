<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717114655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD image VARCHAR(1000) DEFAULT NULL, ADD link VARCHAR(1000) DEFAULT NULL, ADD text VARCHAR(10000) DEFAULT NULL, CHANGE text_content text_content VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP is_verified');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP image, DROP link, DROP text, CHANGE text_content text_content VARCHAR(10000) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
    }
}
