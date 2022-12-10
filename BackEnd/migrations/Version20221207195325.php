<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207195325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE destinatario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, rut VARCHAR(10) NOT NULL, numero_telefono INT NOT NULL, banco_destino VARCHAR(255) NOT NULL, tipo_cuenta VARCHAR(255) NOT NULL, numero_cuenta INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transferencias (id INT AUTO_INCREMENT NOT NULL, destinatario VARCHAR(255) NOT NULL, remitente VARCHAR(255) NOT NULL, monto INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(45) NOT NULL, apellido VARCHAR(45) NOT NULL, rut VARCHAR(10) NOT NULL, correo VARCHAR(255) NOT NULL, contrasenia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE destinatario');
        $this->addSql('DROP TABLE transferencias');
        $this->addSql('DROP TABLE usuarios');
    }
}
