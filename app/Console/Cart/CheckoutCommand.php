<?php

namespace App\Console\Cart;


use App\Console\CartCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CheckoutCommand extends CartCommand
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('CART:CHECKOUT')
            ->setDescription('Show all tasks. including total price in a last row and then clear all items');
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
        $io = new SymfonyStyle($input, $output);
        $io->title('Program STDOUT:');
        $io->newLine();

        $this->printTotal($output);

        $this->emptyCart();
    }

    private function emptyCart()
    {
        $this->cartRepository->truncate();
    }

    /**
     * @param OutputInterface $output
     */
    private function printTotal(OutputInterface $output)
    {

        try {
            $cartItems = $this->cartRepository->with('inventory')->get();
            $total = 0;
            foreach ($cartItems as $cartItem) {
                if ($cartItem['inventory']) {
                    $total += $cartItem['quantity'] * $cartItem['inventory']['price'];
                    $total += $cartItem['quantity'] * $cartItem['price'];
                    $output->writeln("<info>" . sprintf("%s  %s x %s = %s", $cartItem['inventory']['name'], $cartItem['quantity'], $cartItem['inventory']['price'], $cartItem['quantity'] * $cartItem['inventory']['price']) . "</info>");
                }
            }
            $output->writeln('<info>' . sprintf("Total = %s", $total) . '</info>');
        } catch (\Exception $e) {
            \Log::error('Unexpected Error'. $e->getMessage());
        }
    }
}