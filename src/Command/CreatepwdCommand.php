<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\Entity\Login;
use App\Controller\LoginController;
use App\Controller\InitController;

class CreatepwdCommand extends Command {

    protected $login;

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:create-user-pwd')
            ->setDescription('Create User Password passing: id, password, retypepassword')
            ->addArgument('id',InputArgument::REQUIRED,'Id Required')
            ->addArgument('password',InputArgument::REQUIRED,'Password Required')
            ->addArgument('retypePassword',InputArgument::REQUIRED,'Retype Password Required')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('');
        $output->writeln('Create User Password');
        $id = $input->getArgument('id');
        $password = $input->getArgument('password');
        $retypePassword = $input->getArgument('retypePassword');
        $output->writeln('');
        $output->writeln('id = '.$id);
        $output->writeln('password = '.$password);
        $output->writeln('retypePassword = '.$retypePassword);
        $output->writeln('');
        $return = LoginController::createPwd($id,$password,$retypePassword,InitController::getConn());
        $output->writeln($return);
        $output->writeln('');

        return Command::SUCCESS;
    }

}