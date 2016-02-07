<?php
/**
 * Created by Vitaly on 2/2/2016
 * Class SayHelloCommand
 */

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class AddCommand extends Command
{

    public function configure()
    {
        $this->setName('add')
            ->setDescription('Add a new task.')
            ->addArgument('description', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query('insert into tasks(description) values(:description)',
            compact('description')
        );

        $output->writeln('<info>Task added!</info>');

        $this->showTasks($output);
    }

}
