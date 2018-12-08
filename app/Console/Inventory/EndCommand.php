<?php

namespace App\Console\Inventory;


use App\Console\Commands\InventoryCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EndCommand extends InventoryCommand
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('INVENTORY:END')
            ->setDescription('Closes the stage and exits the program');
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
        $output->writeln('<info>Iventory closed. Please ADD items to shopping cart</info>');
    }
}