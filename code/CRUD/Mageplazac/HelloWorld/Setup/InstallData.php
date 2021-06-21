<?php

namespace Mageplazac\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $date;
 
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->date = $date;
    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataHelloWorldRows = [
            [
                'name' => 'News Title 1',
                'post_content' => 'Here is write news description 1',
                'status' => 1,
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'News Title 2',
                'post_content' => 'Here is write news description 2',
                'status' => 1,
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ]
        ];
        
        foreach($dataNewsRows as $data) {
            $setup->getConnection()->insert($setup->getTable('mageplazac_helloworld'), $data);
        }
    }
}
?>