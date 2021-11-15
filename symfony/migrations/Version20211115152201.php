<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115152201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articulo (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, descripcion VARCHAR(255) NOT NULL, ubicacion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movimiento (id INT AUTO_INCREMENT NOT NULL, articulo_id INT DEFAULT NULL, tipo_movimiento_id INT DEFAULT NULL, cantidad INT NOT NULL, fecha_crea DATETIME NOT NULL, INDEX IDX_C8FF107A2DBC2FC9 (articulo_id), INDEX IDX_C8FF107A585486FC (tipo_movimiento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, articulo_id INT DEFAULT NULL, cantidad INT NOT NULL, UNIQUE INDEX UNIQ_4B3656602DBC2FC9 (articulo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_movimiento (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107A2DBC2FC9 FOREIGN KEY (articulo_id) REFERENCES articulo (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107A585486FC FOREIGN KEY (tipo_movimiento_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656602DBC2FC9 FOREIGN KEY (articulo_id) REFERENCES articulo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movimiento DROP FOREIGN KEY FK_C8FF107A2DBC2FC9');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B3656602DBC2FC9');
        $this->addSql('ALTER TABLE movimiento DROP FOREIGN KEY FK_C8FF107A585486FC');
        $this->addSql('DROP TABLE articulo');
        $this->addSql('DROP TABLE movimiento');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE tipo_movimiento');
    }
}
