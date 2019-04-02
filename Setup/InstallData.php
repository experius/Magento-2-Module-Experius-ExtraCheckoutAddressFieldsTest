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

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(
            \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'digi_code',
            [
                'label' => 'digi_code',
                'input' => 'text',
                'type' => 'varchar',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'backend' => ''
            ]
        );


        $attribute = $customerSetup->getEavConfig()
            ->getAttribute(
                \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
                'digi_code'
            )
            ->addData([
                'used_in_forms' => [
                    'customer_address_edit',
                    'customer_register_address'
                ]
            ]);
        $attribute->save();
    }
}
