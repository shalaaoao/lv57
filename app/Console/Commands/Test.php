<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpspider\core\phpspider;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $configs = array(
            'name' => '糗事百科',
            'log_show' => false,
            'domains' => array(
                'qiushibaike.com',
                'www.qiushibaike.com'
            ),
            'scan_urls' => array(
                'http://www.qiushibaike.com/'
            ),
            'content_url_regexes' => array(
                "http://www.qiushibaike.com/article/\d+"
            ),
            'list_url_regexes' => array(
                "http://www.qiushibaike.com/8hr/page/\d+\?s=\d+"
            ),
            'fields' => array(
                array(
                    // 抽取内容页的文章内容
                    'name' => "article_content",
                    'selector' => "//*[@id='single-next-link']",
                    'required' => true
                ),
                array(
                    // 抽取内容页的文章作者
                    'name' => "article_author",
                    'selector' => "//div[contains(@class,'author')]//h2",
                    'required' => true
                ),
            ),
        );
        $spider = new phpspider($configs);
        $spider->start();
    }
}
