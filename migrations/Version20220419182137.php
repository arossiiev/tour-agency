<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419182137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE route_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sight_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sight_in_route_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql("CREATE TABLE route (id INT NOT NULL DEFAULT nextval('route_id_seq'), tour_id INT DEFAULT NULL, duration INT NOT NULL, start_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))");
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2C4207915ED8D43 ON route (tour_id)');
        $this->addSql("CREATE TABLE sight (id INT NOT NULL DEFAULT nextval('sight_id_seq'), name VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))");
        $this->addSql("CREATE TABLE sight_in_route (id INT NOT NULL DEFAULT nextval('sight_in_route_id_seq'), route_id INT DEFAULT NULL, sight_id INT DEFAULT NULL, sight_order INT NOT NULL, PRIMARY KEY(id))");
        $this->addSql('CREATE INDEX IDX_754873E34ECB4E6 ON sight_in_route (route_id)');
        $this->addSql('CREATE INDEX IDX_754873E983D68AB ON sight_in_route (sight_id)');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C4207915ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sight_in_route ADD CONSTRAINT FK_754873E34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sight_in_route ADD CONSTRAINT FK_754873E983D68AB FOREIGN KEY (sight_id) REFERENCES sight (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tour ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE tour ALTER name SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE sight_in_route DROP CONSTRAINT FK_754873E34ECB4E6');
        $this->addSql('ALTER TABLE sight_in_route DROP CONSTRAINT FK_754873E983D68AB');
        $this->addSql('DROP SEQUENCE route_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sight_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sight_in_route_id_seq CASCADE');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE sight');
        $this->addSql('DROP TABLE sight_in_route');
        $this->addSql('CREATE SEQUENCE tour_id_seq');

    }
}
