<?php

namespace App\Console\Commands;


use App\Console\AbstractCommand;
use App\Contracts\InventoryRepositoryInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InventoryCommand extends AbstractCommand
{
    /**
     * @var array
     */
    protected $headers = ['Sku', 'Name', 'Quantity', 'Price'];

    /**
     * @var InventoryRepositoryInterface
     */
    protected $inventoryRepository;

    /**
     * InventoryCommand constructor.
     */
    public function __construct()
    {
        $this->inventoryRepository = app(InventoryRepositoryInterface::class);
        parent::__construct();
    }

    /**
     * @param OutputInterface $output
     * @param array $rows
     * @return mixed
     */
    public function printItems(OutputInterface $output, array $rows)
    {
        if (!$rows) {
            return $output->writeln('<info>No any products in the inventory at the moment!</info>');
        }

        $this->printTable($output, $rows);
    }
}

