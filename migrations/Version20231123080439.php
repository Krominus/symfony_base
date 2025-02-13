<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231123080439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE burger_oignon (burger_id INT NOT NULL, oignon_id INT NOT NULL, INDEX IDX_A40C5A0417CE5090 (burger_id), INDEX IDX_A40C5A048F038184 (oignon_id), PRIMARY KEY(burger_id, oignon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, burger_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_67F068BC17CE5090 (burger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oignon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pain (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE burger_oignon ADD CONSTRAINT FK_A40C5A0417CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
        $this->addSql('ALTER TABLE burger_oignon ADD CONSTRAINT FK_A40C5A048F038184 FOREIGN KEY (oignon_id) REFERENCES oignon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
        $this->addSql('ALTER TABLE burger ADD image_id INT DEFAULT NULL, ADD pain_id INT DEFAULT NULL, ADD commentaire_id INT DEFAULT NULL, DROP pain, DROP oignon, DROP sauce, DROP image, CHANGE commentaire nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D64775A84 FOREIGN KEY (pain_id) REFERENCES pain (id)');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFE35A0D3DA5256D ON burger (image_id)');
        $this->addSql('CREATE INDEX IDX_EFE35A0D64775A84 ON burger (pain_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFE35A0DBA9CD190 ON burger (commentaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0DBA9CD190');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D3DA5256D');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D64775A84');
        $this->addSql('ALTER TABLE burger_oignon DROP FOREIGN KEY FK_A40C5A0417CE5090');
        $this->addSql('ALTER TABLE burger_oignon DROP FOREIGN KEY FK_A40C5A048F038184');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC17CE5090');
        $this->addSql('DROP TABLE burger_oignon');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE oignon');
        $this->addSql('DROP TABLE pain');
        $this->addSql('DROP INDEX UNIQ_EFE35A0D3DA5256D ON burger');
        $this->addSql('DROP INDEX IDX_EFE35A0D64775A84 ON burger');
        $this->addSql('DROP INDEX UNIQ_EFE35A0DBA9CD190 ON burger');
        $this->addSql('ALTER TABLE burger ADD pain INT NOT NULL, ADD oignon INT NOT NULL, ADD sauce INT NOT NULL, ADD image INT NOT NULL, DROP image_id, DROP pain_id, DROP commentaire_id, CHANGE nom commentaire VARCHAR(255) NOT NULL');
    }
}
