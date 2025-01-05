<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250105174328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beach_tourist_guide (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tourist_guide_id INT NOT NULL, INDEX IDX_B8FD3EE377832D5E (tourist_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE cave_tourist_guide (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tourist_guide_id INT NOT NULL, INDEX IDX_74DA890D77832D5E (tourist_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE documentation_general_information (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, route VARCHAR(255) NOT NULL, fas_fa_icon VARCHAR(255) NOT NULL, general_information_id INT NOT NULL, UNIQUE INDEX UNIQ_9171C0A581172FF4 (general_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE general_information (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, INDEX IDX_AE02847398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE info_getting_there (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, link VARCHAR(255) DEFAULT NULL, region_id INT NOT NULL, INDEX IDX_2FA63D2798260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE insurance_information (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) NOT NULL, region_id INT NOT NULL, INDEX IDX_3F6EFE9998260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE natural_park_tourist_guide (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tourist_guide_id INT NOT NULL, INDEX IDX_454D272877832D5E (tourist_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE night_club_toursit_guide (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tourist_guide_id INT NOT NULL, INDEX IDX_1F14B87B77832D5E (tourist_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, country_id INT NOT NULL, INDEX IDX_F62F176F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tourist_guide_id INT NOT NULL, INDEX IDX_EB95123F77832D5E (tourist_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE river_tourist_guide (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, toursit_guide_id INT NOT NULL, INDEX IDX_F0791268DDF5B48C (toursit_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE tourist_guide (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, INDEX IDX_696AD74398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE beach_tourist_guide ADD CONSTRAINT FK_B8FD3EE377832D5E FOREIGN KEY (tourist_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE cave_tourist_guide ADD CONSTRAINT FK_74DA890D77832D5E FOREIGN KEY (tourist_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE documentation_general_information ADD CONSTRAINT FK_9171C0A581172FF4 FOREIGN KEY (general_information_id) REFERENCES general_information (id)');
        $this->addSql('ALTER TABLE general_information ADD CONSTRAINT FK_AE02847398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE info_getting_there ADD CONSTRAINT FK_2FA63D2798260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE insurance_information ADD CONSTRAINT FK_3F6EFE9998260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE natural_park_tourist_guide ADD CONSTRAINT FK_454D272877832D5E FOREIGN KEY (tourist_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE night_club_toursit_guide ADD CONSTRAINT FK_1F14B87B77832D5E FOREIGN KEY (tourist_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F77832D5E FOREIGN KEY (tourist_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE river_tourist_guide ADD CONSTRAINT FK_F0791268DDF5B48C FOREIGN KEY (toursit_guide_id) REFERENCES tourist_guide (id)');
        $this->addSql('ALTER TABLE tourist_guide ADD CONSTRAINT FK_696AD74398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beach_tourist_guide DROP FOREIGN KEY FK_B8FD3EE377832D5E');
        $this->addSql('ALTER TABLE cave_tourist_guide DROP FOREIGN KEY FK_74DA890D77832D5E');
        $this->addSql('ALTER TABLE documentation_general_information DROP FOREIGN KEY FK_9171C0A581172FF4');
        $this->addSql('ALTER TABLE general_information DROP FOREIGN KEY FK_AE02847398260155');
        $this->addSql('ALTER TABLE info_getting_there DROP FOREIGN KEY FK_2FA63D2798260155');
        $this->addSql('ALTER TABLE insurance_information DROP FOREIGN KEY FK_3F6EFE9998260155');
        $this->addSql('ALTER TABLE natural_park_tourist_guide DROP FOREIGN KEY FK_454D272877832D5E');
        $this->addSql('ALTER TABLE night_club_toursit_guide DROP FOREIGN KEY FK_1F14B87B77832D5E');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176F92F3E70');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F77832D5E');
        $this->addSql('ALTER TABLE river_tourist_guide DROP FOREIGN KEY FK_F0791268DDF5B48C');
        $this->addSql('ALTER TABLE tourist_guide DROP FOREIGN KEY FK_696AD74398260155');
        $this->addSql('DROP TABLE beach_tourist_guide');
        $this->addSql('DROP TABLE cave_tourist_guide');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE documentation_general_information');
        $this->addSql('DROP TABLE general_information');
        $this->addSql('DROP TABLE info_getting_there');
        $this->addSql('DROP TABLE insurance_information');
        $this->addSql('DROP TABLE natural_park_tourist_guide');
        $this->addSql('DROP TABLE night_club_toursit_guide');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE river_tourist_guide');
        $this->addSql('DROP TABLE tourist_guide');
    }
}
