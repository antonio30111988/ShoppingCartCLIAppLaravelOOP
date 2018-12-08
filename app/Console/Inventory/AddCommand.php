<?php

namespace App\Console\Inventory;

use App\Console\Commands\InventoryCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends InventoryCommand
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('INVENTORY:ADD')
            ->setDescription('Add product from inventory to cart to cart')
            ->addArgument('sku', InputArgument::REQUIRED)
            ->addArgument('name', InputArgument::REQUIRED)
            ->addArgument('quantity', InputArgument::REQUIRED)
            ->addArgument('price', InputArgument::REQUIRED);
    }

    /**
     * Execute the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $sku = $input->getArgument('sku');
        $name = $input->getArgument('name');
        $quantity = $input->getArgument('quantity');
        $price = $input->getArgument('price');

        try {
            $ifCreated = $this->inventoryRepository->create([
                "sku" => $sku,
                "name" => $name,
                "quantity" => $quantity,
                "price" => $price,
            ]);
            $output->writeln('<info>Product successfully added to inventory!</info>');
            if ($ifCreated) {
                $products = $this->inventoryRepository->all();
                $this->printItems($output, $products);
            }
        } catch (\Exception $e) {
            \Log::error('Exception occurred: '. $e->getMessage());
        }
        parent::execute($input, $output);
    }
}