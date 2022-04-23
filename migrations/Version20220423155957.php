<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423155957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $table = '"order"';
        $this->addSql("CREATE TABLE {$table} (id INT NOT NULL DEFAULT nextval('order_id_seq'), tour_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, second_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id))");
        $this->addSql('CREATE INDEX IDX_F529939815ED8D43 ON "order" (tour_id)');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F529939815ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        $this->addSql('DROP TABLE "order"');

    }
}
