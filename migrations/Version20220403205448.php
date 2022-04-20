<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403205448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tour_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql("CREATE TABLE tour (id INT NOT NULL DEFAULT nextval('tour_id_seq'), name VARCHAR(255), country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, description VARCHAR(1024) NOT NULL, image_url VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE tour_id_seq CASCADE');
        $this->addSql('DROP TABLE tour');
    }
}
