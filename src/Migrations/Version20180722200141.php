<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180722200141 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1172FEA7E');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A0CE293E');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1C36908DA');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1E8D74410');
        $this->addSql('DROP INDEX IDX_723705D1E8D74410 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1172FEA7E ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1A0CE293E ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1C36908DA ON transaction');
        $this->addSql('ALTER TABLE transaction ADD acquirer_id INT NOT NULL, ADD payment_method_id INT NOT NULL, ADD card_brand_id INT NOT NULL, DROP acquirer_id_id, DROP payment_method_id_id, DROP card_brand_id_id, CHANGE merchant_id_id merchant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D16796D554 FOREIGN KEY (merchant_id) REFERENCES merchant (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1924526F1 FOREIGN KEY (acquirer_id) REFERENCES merchant (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D15AA1164F FOREIGN KEY (payment_method_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1FDC41E8B FOREIGN KEY (card_brand_id) REFERENCES card_brand (id)');
        $this->addSql('CREATE INDEX IDX_723705D16796D554 ON transaction (merchant_id)');
        $this->addSql('CREATE INDEX IDX_723705D1924526F1 ON transaction (acquirer_id)');
        $this->addSql('CREATE INDEX IDX_723705D15AA1164F ON transaction (payment_method_id)');
        $this->addSql('CREATE INDEX IDX_723705D1FDC41E8B ON transaction (card_brand_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D16796D554');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1924526F1');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D15AA1164F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1FDC41E8B');
        $this->addSql('DROP INDEX IDX_723705D16796D554 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1924526F1 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D15AA1164F ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1FDC41E8B ON transaction');
        $this->addSql('ALTER TABLE transaction ADD acquirer_id_id INT NOT NULL, ADD payment_method_id_id INT NOT NULL, ADD card_brand_id_id INT NOT NULL, DROP acquirer_id, DROP payment_method_id, DROP card_brand_id, CHANGE merchant_id merchant_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1172FEA7E FOREIGN KEY (acquirer_id_id) REFERENCES merchant (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A0CE293E FOREIGN KEY (payment_method_id_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1C36908DA FOREIGN KEY (card_brand_id_id) REFERENCES card_brand (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1E8D74410 FOREIGN KEY (merchant_id_id) REFERENCES merchant (id)');
        $this->addSql('CREATE INDEX IDX_723705D1E8D74410 ON transaction (merchant_id_id)');
        $this->addSql('CREATE INDEX IDX_723705D1172FEA7E ON transaction (acquirer_id_id)');
        $this->addSql('CREATE INDEX IDX_723705D1A0CE293E ON transaction (payment_method_id_id)');
        $this->addSql('CREATE INDEX IDX_723705D1C36908DA ON transaction (card_brand_id_id)');
    }
}
