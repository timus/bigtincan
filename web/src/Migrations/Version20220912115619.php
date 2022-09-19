<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912115619 extends AbstractMigration
{

    /**
     * @var string
     */
    protected const TABLE_NAME = 'url';

    public function getDescription(): string
    {
        return 'create table for url';
    }

    /**
     * @param Schema $schema
     *
     */
    public function up(Schema $schema): void
    {
        $table = $schema->createTable(self::TABLE_NAME);

        $table->addColumn('id', Types::INTEGER, ['unsigned' => true, 'autoincrement' => true, 'notNull' => true]);
        $table->addColumn('url', Types::STRING, ['length' => 500, 'notNull' => true]);
        $table->addColumn('short_url', Types::STRING, ['length' => 50, 'notNull' => true]);
        $table->addColumn('created', Types::DATETIME_MUTABLE, ['notNull' => true]);
        $table->addColumn('modified', Types::DATETIME_MUTABLE, ['notNull' => true]);
        $table->addColumn('deleted', Types::SMALLINT, ['default' => 0]);

        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     *
     */
    public function down(Schema $schema): void
    {
        $schema->dropTable(self::TABLE_NAME);
    }
}
