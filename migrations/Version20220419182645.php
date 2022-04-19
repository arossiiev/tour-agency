<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419182645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO route(tour_id , duration, start_time) VALUES (1, 18000, '2022-09-18 12:34:38');");
        $this->addSql("INSERT INTO route(tour_id ,  duration, start_time) VALUES (2,  28800, '2022-09-18 12:34:38');");
        $this->addSql("INSERT INTO route(tour_id ,  duration, start_time) VALUES (3, 28800, '2022-10-18 16:34:38');");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM route WHERE tour_id=1;");
        $this->addSql("DELETE FROM route WHERE tour_id=2;");
        $this->addSql("DELETE FROM route WHERE tour_id=3;");
    }
}
