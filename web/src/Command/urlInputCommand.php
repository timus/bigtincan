<?php

namespace App\Command;

use App\Service\UrlService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class urlInputCommand
 *
 *
 * Example to run:
 * php bin/console create_url --url=http://www.demo.com --validtill=1
 * @codeCoverageIgnore
 */
class urlInputCommand extends Command
{

    /**
     * @var string
     */
    public const COMMAND_NAME = 'create_url';
    /**
     * @var UrlService
     */
    protected UrlService $urlService;


    public function __construct(UrlService $urlService)
    {
        parent::__construct();
        $this->urlService = $urlService;
    }

    /**
     * Configuration for the Command
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->addOption(
                'url',
                'u',
                InputOption::VALUE_REQUIRED,
                'URL'
            )
            ->addOption(
                'validtill',
                'vt',
                InputOption::VALUE_REQUIRED,
                'Valid Till'
            )
            ->setDescription('Shorten the URL');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getOption('url');
        $validTill = (int)$input->getOption('validtill');
        $url = $this->urlService->create($url, $validTill);
        echo $url->getShortUrl() . ' created';
        return 0;
    }
}