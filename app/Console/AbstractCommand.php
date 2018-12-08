<?php

namespace App\Console;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Illuminate\Console\Command;

abstract class AbstractCommand extends Command
{
    /**
     * @param OutputInterface $output
     * @param array $rows
     * @return mixed
     */
    abstract public function printItems(OutputInterface $output, array $rows);

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

    }

    /**
     * @param OutputInterface $output
     * @param array $rows
     */
    protected function printTable(OutputInterface $output, $rows)
    {
        dump($rows);

        if (!empty($this->headers) && !empty($rows)) {
            $table = new Table($output);

            $table->setHeaders($this->headers)
                ->setRows($rows)
                ->render();
        }
    }
}