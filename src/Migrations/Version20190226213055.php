<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190226213055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE user_sub_category (user_id INT NOT NULL, sub_category_id INT NOT NULL, PRIMARY KEY(user_id, sub_category_id))');
        $this->addSql('CREATE INDEX IDX_3C2F8B9AA76ED395 ON user_sub_category (user_id)');
        $this->addSql('CREATE INDEX IDX_3C2F8B9AF7BFE87C ON user_sub_category (sub_category_id)');
        $this->addSql('ALTER TABLE user_sub_category ADD CONSTRAINT FK_3C2F8B9AA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_sub_category ADD CONSTRAINT FK_3C2F8B9AF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE interest');
        $this->addSql('DROP TABLE likeprod');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE interest (user_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(user_id, category_id))');
        $this->addSql('CREATE INDEX idx_6c3e1a67a76ed395 ON interest (user_id)');
        $this->addSql('CREATE INDEX idx_6c3e1a6712469de2 ON interest (category_id)');
        $this->addSql('CREATE TABLE likeprod (user_id INT NOT NULL, product_id INT NOT NULL, PRIMARY KEY(user_id, product_id))');
        $this->addSql('CREATE INDEX idx_5b59aa84a76ed395 ON likeprod (user_id)');
        $this->addSql('CREATE INDEX idx_5b59aa844584665a ON likeprod (product_id)');
        $this->addSql('ALTER TABLE interest ADD CONSTRAINT fk_6c3e1a67a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interest ADD CONSTRAINT fk_6c3e1a6712469de2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE likeprod ADD CONSTRAINT fk_5b59aa84a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE likeprod ADD CONSTRAINT fk_5b59aa844584665a FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE user_sub_category');
    }
}
