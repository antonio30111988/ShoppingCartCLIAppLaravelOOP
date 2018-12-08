<?php

namespace App\Console;

use App\Contracts\CartRepositoryInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CartCommand extends AbstractCommand
{
    /**
     * @var array
     */
    protected $headers = ['Id', 'Sku', 'Quantity'];

    /**
     * @var CartRepositoryInterface
     */
    protected $cartRepository;

    /**
     * CartCommand constructor.
     */
    public function __construct()
    {
        $this->cartRepository = app(CartRepositoryInterface::class);

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
            return $output->writeln('<info>No any itens in the cart at the moment!</info>');
        }

        $this->printTable($output, $rows);
    }
}
