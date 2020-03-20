<?php declare(strict_types=1);

namespace CrehlerAssocExperiment\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1584629219ProductLink extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1584629219;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate(
            'CREATE TABLE `product_link` (
              `product_source_id` BINARY(16) NOT NULL,
              `product_source_version_id` BINARY(16) NOT NULL,
              `product_destination_id` BINARY(16) NOT NULL,
              `product_destination_version_id` BINARY(16) NOT NULL,
              PRIMARY KEY (`product_source_id`, `product_source_version_id`, `product_destination_id`, `product_destination_version_id`),
              CONSTRAINT `fk.product_link.product_source_id` FOREIGN KEY (`product_source_id`, `product_source_version_id`)
                REFERENCES `product` (`id`, `version_id`) ON DELETE CASCADE ON UPDATE CASCADE,
              CONSTRAINT `fk.product_link.product_destination_id` FOREIGN KEY (`product_destination_id`, `product_destination_version_id`)
                REFERENCES `product` (`id`, `version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
             '
        );
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
