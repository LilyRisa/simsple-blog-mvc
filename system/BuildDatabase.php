<?php  
namespace minapp\system;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

include 'install/install.php';
require_once "config/config.php";




class BuildDatabase extends Command
{
    protected $commandName = 'install';
    protected $commandDescription = "Create database";

    protected $commandArgumentName = "name";
    protected $commandArgumentDescription = "What database do you want to create with?";

    protected $commandOptionName = "db"; // should be specified like "app:model myModel --db"
    protected $commandOptionDescription = 'If set, it will create a table based on the model';    

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            )
            ->addOption(
               $this->commandOptionName,
               null,
               InputOption::VALUE_NONE,
               $this->commandOptionDescription
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
     {
            
     	$name = $input->getArgument($this->commandArgumentName);
        $db = new install(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        $tb = $db->connect();
        $output->writeln('==> '.$tb.' <=='.PHP_EOL);
        if($name && $name == 'install'){
        	$statement = $db->installtable();
        	$text = "<fg=yellow>===> ".$statement." <===</>".PHP_EOL;
        	$output->writeln($text);
        }

    }
}






?>