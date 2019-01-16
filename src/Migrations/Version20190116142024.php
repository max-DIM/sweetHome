<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116142024 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, sex VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, response_rate INT DEFAULT NULL, response_delay VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asset (id INT AUTO_INCREMENT NOT NULL, actor_id INT NOT NULL, descript VARCHAR(255) DEFAULT NULL, daily_rate INT DEFAULT NULL, nb_person INT DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, floor VARCHAR(100) DEFAULT NULL, accomodation_type VARCHAR(255) NOT NULL, state VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, gps VARCHAR(255) DEFAULT NULL, INDEX IDX_2AF5A5C10DAF24A (actor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asset_equipment (asset_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_3E023DB95DA1941 (asset_id), INDEX IDX_3E023DB9517FE9FE (equipment_id), PRIMARY KEY(asset_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE availibility_calendar (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, bookable_date DATE NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5C3150825DA1941 (asset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, actor_id INT NOT NULL, description LONGTEXT NOT NULL, rating INT NOT NULL, INDEX IDX_9474526C5DA1941 (asset_id), INDEX IDX_9474526C10DAF24A (actor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `condition` (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, payement VARCHAR(100) NOT NULL, arrival_time TIME DEFAULT NULL, departure_time TIME DEFAULT NULL, is_smoker_friendly TINYINT(1) DEFAULT NULL, has_parking TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_BDD688435DA1941 (asset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, status VARCHAR(100) DEFAULT NULL, equipment_category VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, picture VARBINARY(255) NOT NULL, INDEX IDX_16DB4F895DA1941 (asset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, arrival_date DATE NOT NULL, departure_date DATE NOT NULL, traveller_nb INT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_42C849555DA1941 (asset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_actor (reservation_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_70A865EB83297E7 (reservation_id), INDEX IDX_70A865E10DAF24A (actor_id), PRIMARY KEY(reservation_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5C10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id)');
        $this->addSql('ALTER TABLE asset_equipment ADD CONSTRAINT FK_3E023DB95DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asset_equipment ADD CONSTRAINT FK_3E023DB9517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE availibility_calendar ADD CONSTRAINT FK_5C3150825DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id)');
        $this->addSql('ALTER TABLE `condition` ADD CONSTRAINT FK_BDD688435DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F895DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849555DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE reservation_actor ADD CONSTRAINT FK_70A865EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_actor ADD CONSTRAINT FK_70A865E10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5C10DAF24A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C10DAF24A');
        $this->addSql('ALTER TABLE reservation_actor DROP FOREIGN KEY FK_70A865E10DAF24A');
        $this->addSql('ALTER TABLE asset_equipment DROP FOREIGN KEY FK_3E023DB95DA1941');
        $this->addSql('ALTER TABLE availibility_calendar DROP FOREIGN KEY FK_5C3150825DA1941');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5DA1941');
        $this->addSql('ALTER TABLE `condition` DROP FOREIGN KEY FK_BDD688435DA1941');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F895DA1941');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849555DA1941');
        $this->addSql('ALTER TABLE asset_equipment DROP FOREIGN KEY FK_3E023DB9517FE9FE');
        $this->addSql('ALTER TABLE reservation_actor DROP FOREIGN KEY FK_70A865EB83297E7');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE asset');
        $this->addSql('DROP TABLE asset_equipment');
        $this->addSql('DROP TABLE availibility_calendar');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE `condition`');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_actor');
    }
}
