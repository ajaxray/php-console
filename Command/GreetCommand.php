<?php
namespace PHPConsole\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

// Uncomment the following line if you need to use database
// use RedBean_Facade as R;

class GreetCommand extends Command
{
    private $dc;

    public function __construct($dc)
    {
        parent::__construct();

        $this->dc = $dc;
    }

    protected function configure()
    {
        $this
            ->setName('demo:greet')
            ->setDescription('Greet someone')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        Example Database use
//        ---------------------------
//        if($this->dc['db']) {
//
//            $post = R::dispense('post');
//            $post->text = 'Hello World';
//            $id = R::store($post);
//        }

//        Example Logging
//        -----------------------
//        $this->dc['logger']->debug("Testing a command? Cool!");

        $name = $input->getArgument('name');
        if ($name) {
            $text = 'Hello ' . $name;
        } else {
            $text = 'Hello';
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}