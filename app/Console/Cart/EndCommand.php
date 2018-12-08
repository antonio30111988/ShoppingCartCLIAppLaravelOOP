<?php

namespace App\Console\Cart;


use App\Console\CartCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EndCommand extends CartCommand
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('CART:END')
            ->setDescription('Close inventory management and go to shopping cart');
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
        $output->writeln('<info>Closes the stage and exits the program</info>');
    }

}