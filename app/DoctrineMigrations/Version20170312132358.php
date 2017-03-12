<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170312132358 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE `attribute` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
        `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `type` smallint(6) NOT NULL,
        `category_id` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `category` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `manufacture` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
      `category_id` int(11) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_manufacture` datetime NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT \'1\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT \'(DC2Type:array)\',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');


        $this->addSql('ALTER TABLE category ADD UNIQUE KEY (name)');
        $this->addSql('ALTER TABLE manufacture ADD UNIQUE KEY (name)');
        $this->addSql('ALTER TABLE attribute ADD UNIQUE KEY (name)');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT `attribute_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)');
        $this->addSql('ALTER TABLE manufacture ADD CONSTRAINT `manufacture_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT `product_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT `product_manufacture_id_fk` FOREIGN KEY (`manufacture_id`) REFERENCES `manufacture` (`id`)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT `product_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT `product_image_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `user` (`id`)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEYproduct_image_product_id_fk');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY `product_manufacture_id_fk`');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY `product_user_id_fk`');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY `product_category_id_fk`');
        $this->addSql('ALTER TABLE manufacture DROP FOREIGN KEY `manufacture_category_id_fk`');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY `attribute_category_id_fk`');

        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE manufacture');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_image');
        $this->addSql('DROP TABLE user');
    }
}
