<?php

namespace App;

use App\Engine\Wikipedia\WikipediaEngine;
use App\Engine\Wikipedia\WikipediaParser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SearchCommand extends Command
{
    protected function configure()
    {
        $this->setName('search')->addArgument('term');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $wikipedia = new WikipediaEngine(new WikipediaParser(), HttpClient::create());
        $result = $wikipedia->search($input->getArgument('term'));
        var_dump($result);

        $output->writeln(['','=======================','  Wikipedia', '=======================','']);
        $output->writeln('Você buscou por: '.$input->getArgument('term'));
        $output->writeln(['=======================']);

        return Command::SUCCESS;
    }
}