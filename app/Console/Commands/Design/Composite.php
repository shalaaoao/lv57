<?php

namespace App\Console\Commands\Design;

use Illuminate\Console\Command;

class Composite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'design:composite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '设计模式-组合模式';

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

    }
}

abstract class Role
{
    protected array  $userRoleList;
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function add(Role $role): self;

    abstract public function remove(Role $role);

    abstract public function sendMessage();
}

class RoleManager extends Role
{
    public function add(Role $role): self
    {
        $this->userRoleList[] = $role;
        return $this;
    }

    public function remove(Role $role)
    {
        $position = 0;
        foreach ($this->userRoleList as $n) {
            ++$position;
            if ($n == $role) {
                array_splice($this->userRoleList, ($position), 1);
            }
        }
    }

    public function sendMessage()
    {
        echo "开发发送用户角色：" . $this->name . '下的所有用户短信', PHP_EOL;
        foreach ($this->userRoleList as $role) {
            $role->sendMessage();
        }
    }
}

class Team extends Role
{
    public function add(Role $role): self
    {
        echo '小组用户不能添加下级了！', PHP_EOL;
        return $this;
    }

    public function remove(Role $role)
    {
        echo '小组用户没有下级可以删除！', PHP_EOL;
    }

    public function sendMessage()
    {
        echo '小组用户角色：' . $this->name . '的短信已发送！', PHP_EOL;
    }
}

// root用户
//$root = new RoleManager('网站用户');
//$root->add(new Team('主站用户'));
//$root->sendMessage();

// 社交板块
$root2    = new RoleManager('社交板块');
$managerA = (new RoleManager('论坛用户'))
    ->add(new Team('北京论坛用户'))
    ->add(new Team('上海论坛用户'));
$root2->add($managerA);


$managerB = (new RoleManager('sns用户'))
    ->add(new Team('北京sns用户'))
    ->add(new Team('上海sns用户'));
$root2->add($managerB);

$root2->sendMessage();


