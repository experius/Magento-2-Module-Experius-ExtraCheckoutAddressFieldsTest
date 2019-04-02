<?php
/**
 * A Magento 2 module named Experius/ExtraCheckoutAddressFieldsTest
 * Copyright (C) 2019  Experius
 *
 * This file is part of Experius/ExtraCheckoutAddressFieldsTest.
 *
 * Experius/ExtraCheckoutAddressFieldsTest is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Experius\ExtraCheckoutAddressFieldsTest\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->getConnection()->addColumn(
            $setup->getTable('quote_address'),
            'digi_code',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'comment' => 'Digi Code'
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_address'),
            'digi_code',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'comment' => 'Digi Code'
            ]
        );
    }
}