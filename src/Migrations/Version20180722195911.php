<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180722195911 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE card_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE merchant (id INT AUTO_INCREMENT NOT NULL, cnpj VARCHAR(14) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, merchant_id_id INT DEFAULT NULL, acquirer_id_id INT NOT NULL, payment_method_id_id INT NOT NULL, card_brand_id_id INT NOT NULL, status_info_id INT NOT NULL, checkout_code INT NOT NULL, ciphered_card_number VARCHAR(16) NOT NULL, amount_in_cent INT NOT NULL, installments INT NOT NULL, created_at DATETIME NOT NULL, acquirer_authorization_data_time DATETIME NOT NULL, INDEX IDX_723705D1E8D74410 (merchant_id_id), INDEX IDX_723705D1172FEA7E (acquirer_id_id), INDEX IDX_723705D1A0CE293E (payment_method_id_id), INDEX IDX_723705D1C36908DA (card_brand_id_id), INDEX IDX_723705D1555BB67D (status_info_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_method (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_info (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_F38F9CC36BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acquirer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1E8D74410 FOREIGN KEY (merchant_id_id) REFERENCES merchant (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1172FEA7E FOREIGN KEY (acquirer_id_id) REFERENCES merchant (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A0CE293E FOREIGN KEY (payment_method_id_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1C36908DA FOREIGN KEY (card_brand_id_id) REFERENCES card_brand (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1555BB67D FOREIGN KEY (status_info_id) REFERENCES status_info (id)');
        $this->addSql('ALTER TABLE status_info ADD CONSTRAINT FK_F38F9CC36BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1C36908DA');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1E8D74410');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1172FEA7E');
        $this->addSql('ALTER TABLE status_info DROP FOREIGN KEY FK_F38F9CC36BF700BD');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A0CE293E');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1555BB67D');
        $this->addSql('DROP TABLE card_brand');
        $this->addSql('DROP TABLE merchant');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE payment_method');
        $this->addSql('DROP TABLE status_info');
        $this->addSql('DROP TABLE acquirer');
    }
}
