<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412215202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE route_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql("CREATE TABLE route (id INT NOT NULL DEFAULT nextval('route_id_seq'), tour_id INT NOT NULL, duration INT NOT NULL, start_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, description VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))");
        $this->addSql('CREATE INDEX IDX_2C4207915ED8D43 ON route (tour_id)');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C4207915ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tour ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE route_id_seq CASCADE');
        $this->addSql('DROP TABLE route');
        $this->addSql('SELECT setval(\'tour_id_seq\', (SELECT MAX(id) FROM tour))');
        $this->addSql('ALTER TABLE tour ALTER id SET DEFAULT nextval(\'tour_id_seq\')');
    }
}
