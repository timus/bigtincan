<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919010035 extends AbstractMigration
{

    /**
     * @var string
     */
    protected const TABLE_NAME = 'url';

    public function getDescription(): string
    {
        return '';
    }

    /**
     * @param Schema $schema
     *
     */
    public function up(Schema $schema): void
    {
        $table = $schema->getTable(self::TABLE_NAME);
        $table->addColumn('validHours', Types::SMALLINT, ['default' => 0]);
    }

    /**
     * @param Schema $schema
     *
     */
    public function down(Schema $schema): void
    {
        $table = $schema->getTable(self::TABLE_NAME);
        $table->dropColumn('validHours');
    }
}
