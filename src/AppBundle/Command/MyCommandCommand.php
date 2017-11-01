<?php

namespace AppBundle\Command;

use AppBundle\MyPrivateService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommandCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('custom:my-command')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        $service=$this->getContainer()->get(MyPrivateService::class);
        //var_dump($service);
        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln('Command result.');
    }

}
