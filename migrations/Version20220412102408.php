<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412102408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO tour(country, city, description, image_url, price) VALUES ('Україна', 'Київ', 'Київ  — столиця та найбільше місто України, одне з найбільших і найстаріших міст Європи. Розташований у середній течії Дніпра, у північній Наддніпрянщині.', 'http://localhost:8000/images/kiyv.jpg', 56000);");
        $this->addSql("INSERT INTO tour(country, city, description, image_url, price) VALUES ('Україна', 'Львів','Історичний центр Львова занесено до списку Світової спадщини ЮНЕСКО. У місті розташована найбільша кількість памяток архітектури в Україні. 2009 року Львову надано звання Культурної столиці України.', 'http://localhost:8000/images/kiyv.jpg', 72000);");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM tour WHERE city='Київ';");
        $this->addSql("DELETE FROM tour WHERE city='Львів';");

    }
}
