<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170312134414 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO category (name) VALUES (\'Mobile\');');
        $this->addSql('INSERT INTO manufacture (name, category_id) VALUES (\'SONY\', 1), (\'IPHONE\', 1);');
        $this->addSql('INSERT INTO attribute (name, label, type, category_id) VALUES (\'detail_description\', \'Detail Description\', 5, 1), (\'inches\', \'Inches\', 3, 1);');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM attribute');
        $this->addSql('DELETE FROM manufacture');
        $this->addSql('DELETE FROM category');
        $this->addSql('DELETE FROM user');
    }
}
