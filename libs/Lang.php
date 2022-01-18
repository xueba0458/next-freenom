<?php
/**
 * 语言包加载
 *
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2020/1/16
 * @time 16:30
 */

namespace Luolongfei\Libs;

class Lang extends Base
{
    /**
     * @var array
     */
    public $lang;

    public function init()
    {
        $this->lang = require sprintf('%s/lang/%s.php', RESOURCES_PATH, config('locale'));
    }

    /**
     * @param string $key
     *
     * @return array|mixed|null
     */
    public function get($key = '')
    {
        $lang = $this->lang;

        if (strlen($key)) {
            if (strpos($key, '.')) {
                $keys = explode('.', $key);
                $val = $lang;
                foreach ($keys as $k) {
                    if (!isset($val[$k])) {
                        return null; // 任一下标不存在就返回null
                    }

                    $val = $val[$k];
                }

                return $val;
            } else {
                if (isset($lang[$key])) {
                    return $lang[$key];
                }

                return null;
            }
        }

        return $lang;
    }
}