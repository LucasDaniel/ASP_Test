<?php

namespace ASPTest\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use ASPTest\Entity\Login;
use ASPTest\Controller\LoginController;
use ASPTest\Controller\InitController;

class CreateCommand extends Command {

    protected $login;

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Create User passing: firstName, lastName, email, age')
            ->addArgument('firstName',InputArgument::REQUIRED,'First Name Required')
            ->addArgument('lastName',InputArgument::REQUIRED,'Last Name Required')
            ->addArgument('email',InputArgument::REQUIRED,'Email Required')
            ->addArgument('age',InputArgument::OPTIONAL,'Age Optional')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('');
        $output->writeln('Create User');
        $this->login = new Login($input->getArgument('firstName'),
                                 $input->getArgument('lastName'),
                                 $input->getArgument('email'),
                                 $input->getArgument('age'));
        $output->writeln('');
        $output->writeln('login = '.json_encode($this->login));
        $output->writeln('');
        $return = LoginController::create($this->login,InitController::getConn());
        $output->writeln($return);
        $output->writeln('');   

        return Command::SUCCESS;
    }

}