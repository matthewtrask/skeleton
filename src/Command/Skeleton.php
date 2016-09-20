<?php

namespace Skeleton\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SkeletonCommand extends Command
{
    protected function configure()
    {
        $this->setName('create-project')
            ->setDescription('Quickly bootstrap a new project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('==========================================');
        $output->writeln('Skeleton -- The fast bootstrapping library');
        $output->writeln('==========================================');


    }
}