<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420104524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO sight(name, image_url, description, latitude, longitude) VALUES ('Собор Софія Київська', '/images/saint-sophia-cathedral.jpg',E'Софійський собор, або Софія Київська — визначна пам\'ятка історії та архітектури України, розташована на Софійській площі міста Києва. Збудований у 1011–1018 роках київським князем Ярославом. Названий на честь Святої Софії.', 50.4529536416011, 30.51428642645325);");
        $this->addSql("INSERT INTO sight(name, image_url, description, latitude, longitude) VALUES ('Будинок із химерами', '/images/casa-con-quimeras.jpg',E'Будинок із химерами (1901–1902) — цегляна споруда з прикрасами міфологічних та мисливських сюжетів, є головною архітектурною спорудою раннього неоготичного стилю Києва, столиці України. Свою назву отримала завдяки скульптурним прикрасам, тематика яких — тваринний наземний та підводний світи, атрибути полювання, міфічні істоти.', 50.4450932062117, 30.52858333369766);");
        $this->addSql("INSERT INTO sight(name, image_url, description, latitude, longitude) VALUES ('Золоті ворота', '/images/golden-gate.jpg',E'Золоті ворота — головна брама стародавнього Києва, пам\'ятка оборонної архітектури Київської Русі, одна з найдавніших датованих споруд Східної Європи, символ Києва. Свою назву одержали за аналогією із Золотими воротами в Константинополі (Царгороді).', 50.44893305920019, 30.513369812838818);");
        $this->addSql("INSERT INTO sight(name, image_url, description, latitude, longitude) VALUES ('Замок барона Штейнгеля', '/images/caption.jpg', E'Замок барона — комплекс з особняка, флігеля і парка барона Рудольфа Штейнгеля, батька генерального секретаря торгівлі й промисловості Центральної Ради і посла Української Держави у Берліні Федора Штейнгеля.', 50.44930005565662, 30.511997520182486);");
        $this->addSql("INSERT INTO sight(name, image_url, description, latitude, longitude) VALUES ('Національний експоцентр України', '/images/getlstd-property-photo.jpg',E'Національний комплекс «Експоцентр України» (раніше Виставка досягнень народного господарства (ВДНГ) УРСР) — єдина державна виставкова установа України — організатор міжнародних та національних виставок і ярмарків, демонстраційний центр досягнень України в економічній, науковій, виробничій, гуманітарній та інших галузях.', 50.377991577059674, 30.479293676628462);");
        $this->addSql("INSERT INTO sight_in_route(route_id, sight_id, sight_order) VALUES (1, 1, 1);");
        $this->addSql("INSERT INTO sight_in_route(route_id, sight_id, sight_order) VALUES (1, 2, 2);");
        $this->addSql("INSERT INTO sight_in_route(route_id, sight_id, sight_order) VALUES (1, 3, 3);");
        $this->addSql("INSERT INTO sight_in_route(route_id, sight_id, sight_order) VALUES (1, 4, 4);");
        $this->addSql("INSERT INTO sight_in_route(route_id, sight_id, sight_order) VALUES (1, 5, 5);");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("TRUNCATE sight;");
        $this->addSql("TRUNCATE sight_in_route;");
    }
}
