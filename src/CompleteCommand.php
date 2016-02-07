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

class CompleteCommand extends Command
{

    public function configure()
    {
        $this->setName('complete')
            ->setDescription('Complete a task by its id.')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('delete from tasks where id = :id', compact('id'));

        $output->writeln('<info>Task completed!</info>');

        $this->showTasks($output);
    }

}
