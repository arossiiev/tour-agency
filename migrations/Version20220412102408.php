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
        $this->addSql("INSERT INTO tour(name, country, city, description, image_url, price) VALUES ('Архітектура Києву' ,'Україна', 'Київ', E'Тур по найцікавішим архітектурним пам\'яткам Києва', '/images/kiyv.jpg', 56000);");
        $this->addSql("INSERT INTO tour(name, country, city, description, image_url, price) VALUES (E'Пам\'ятки Львову', 'Україна', 'Львів','Історичний центр Львова занесено до списку Світової спадщини ЮНЕСКО. У місті розташована найбільша кількість памяток архітектури в Україні. 2009 року Львову надано звання Культурної столиці України.', '/images/lviv.jpg', 72000);");
        $this->addSql("INSERT INTO tour(name, country, city, description, image_url, price) VALUES ('Музеї Києву' ,'Україна', 'Київ', 'Відвідайте відомі музеї Києву', '/images/museums-kiyv.jpg', 66000);");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("TRUNCATE tour;");


    }
}
