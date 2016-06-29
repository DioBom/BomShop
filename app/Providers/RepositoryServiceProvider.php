<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * 仓库服务提供者
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * 仓库Contract的命名空间
     * @var string
     */
    protected $contractNamespace = 'App\Contracts\Repositories';

    /**
     * 仓库的命名空间
     * @var array
     */
    protected $repositoryNamespace = [
        'eloquent' => 'App\Repositories\Eloquent'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
    }

    /**
     * 需要注册的仓库
     * @return array
     */
    protected function repositories()
    {
        return [
            'User',
            'Menu'
        ];
    }

    /**
     * 绑定仓库的一种实现到Contract
     * @param string $type
     */
    protected function bindRepositories($type = 'eloquent')
    {
        foreach ($this->repositories() as $repository) {
            $this->app->bind($this->getContractName($repository), $this->getRepositoryName($repository, $type));
        }
    }

    /**
     * 获取仓库Contract的类名称
     * @param $repository
     * @return string
     */
    protected function getContractName($repository)
    {
        return $this->contractNamespace . '\\' . ucfirst($repository);
    }

    /**
     * 获取仓库一种实现的类名称
     * @param $repository
     * @param string $type
     * @return string
     */
    protected function getRepositoryName($repository, $type = 'eloquent')
    {
        return $this->repositoryNamespace[$type] . '\\' . ucfirst($repository) . 'Repository';
    }
}
