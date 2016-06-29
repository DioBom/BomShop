<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/3/25
 * Time: 11:17
 */

namespace App\Support;


class Tree
{
    protected $data;

    protected $key;

    protected $parentKey;

    protected $childKey;

    protected $levelKey;

    protected $locator;

    public function __construct(
        array $data,
        $key = 'id',
        $parentKey = 'parent_id',
        $childKey = '_child',
        $levelKey = '_level',
        $locator = '_locator'
    ) {
        $this->data = $data;
        $this->key = $key;
        $this->parentKey = $parentKey;
        $this->childKey = $childKey;
        $this->levelKey = $levelKey;
        $this->locator = $locator;
    }

    /**
     * 快速生成树
     * @return array
     */
    public function toTree()
    {
        $refer = [];
        $tree = [];
        foreach ($this->data as $item) {
            $refer[$item[$this->key]] = $item;
        }

        foreach ($refer as $item) {
            if(isset($refer[$item[$this->parentKey]])){
                $refer[$item[$this->parentKey]][$this->childKey][] = &$refer[$item[$this->key]];
            }else{
                $tree[] = &$refer[$item[$this->key]];
            }
        }

        return $tree;
    }

    /**
     * 获取带level标记的tree
     * @return array
     */
    public function getTreeWithLevel()
    {
        return $this->getTree($this->data, 0, 1);
    }

    /**
     * 递归的方式生成树
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    protected function getTree($data, $pid = 0, $level = 1)
    {
        $tree = [];
        foreach ($data as $k => $v) {
            if ($v[$this->parentKey] == $pid) {
                $v[$this->levelKey] = $level;
                $v[$this->childKey] = $this->getTree($data, $v[$this->key], $level + 1);
                $tree[] = $v;
                unset($data[$k]);
            }
        }

        return $tree;
    }

    public function getOptions($config = [], $select = 0, $setBase = true)
    {
        $default = [
            'map' => [
                'title' => 'title',
                'value' => 'id'
            ],
            'base' => [
                'title' => '无',
                'value' => 0
            ]
        ];

        $config = array_merge($default, $config);

        $html = '';
        if ($setBase) {
            $html .= "<option value=\"{$config['base']['value']}\">{$config['base']['title']}</option>";
        }

        $tree = $this->getTreeWithLevel();

        return $html . $this->buildOptions($tree, $config, $select);
    }

    protected function buildOptions($tree, $config, $select)
    {
        $html = '';
        foreach ($tree as $item) {
            $prefix = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $item[$this->levelKey]) . '|— ';
            $title = $prefix . $item[$config['map']['title']];
            $selected = $item[$config['map']['value']] == $select ? 'selected' : '';
            $html .= "<option value=\"{$item[$config['map']['value']]}\" {$selected}>{$title}</option>";
            if ($item[$this->childKey]) {
                $html .= $this->buildOptions($item[$this->childKey], $config, $select);
            }
        }

        return $html;
    }
}