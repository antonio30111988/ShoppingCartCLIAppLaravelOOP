<?php

namespace App\Console\Cart;

use App\Console\CartCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends CartCommand
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('CART:ADD')
            ->setDescription('Add product from inventory to cart to cart')
            ->addArgument('sku', InputArgument::REQUIRED)
            ->addArgument('quantity', InputArgument::REQUIRED);
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

        try {
            $sku = $input->getArgument('sku');
            $quantity = $input->getArgument('quantity');
            $cart = $this->cartRepository->findBy('sku', $sku);
            $cartArray = $cart->toArray();
            if ($cartArray['sku'] === $sku) {
                $this->cartRepository->update(['quantity' => $cartArray['quantity'] + $quantity], 'sku', $sku);
            } else {
                $data = [
                    'sku' => $sku,
                    'quantity' => $quantity,
                ];

                $ifCreated = $this->cartRepository->create($data);
                if ($ifCreated) {
                    $output->writeln('<info>Product(cart items) successfully added!</info>');
                }
            }
            $repo = $this->cartRepository->findBy('sku', $sku);
            $repoArray = $repo->toArray();
            $this->printItems($output, [$repoArray]);
        } catch (\Exception $e) {
            \Log::error('Unexpected error: ' . $e->getMessage());
        }

        parent::execute($input, $output);
    }
}