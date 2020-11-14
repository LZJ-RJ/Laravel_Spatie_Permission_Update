<?php

namespace App\Http\Controllers;

use App\Option;
use Arr;
use Auth;
use Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests ;

    /**
     * 顯示名稱
     *
     * @var string
     */
    protected $name;

    /**
     * Slug
     *
     * @var string
     */
    protected $slug;

    /**
     * 所需權限，有一個符合即可
     * 如沒有填入，代表不設限
     * 子選單預設會沿用父選單的權限，如有填入，則再加上自己的權限
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * 選單項目的Icon類別
     *
     * @var array
     */
    protected $iconClasses = [];

    /**
     * @var array
     */
    protected $badge;

    /**
     * 頁面表單欄位
     *
     * @var array
     */
    protected $data_array = [];

    /**
     * Default route handler
     */
    public function handle(Request $request)
    {
        abort(404);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return trans($this->name);
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     */
    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * Get bootstrap badge arguments
     *
     * @return array|null
     */
    public function getBadge()
    {
        if(!empty($this->badge['label']) && !empty($this->badge['type'])) {
            return Arr::add($this->badge, 'isPill', false);
        } else {
            return null;
        }
    }

    /**
     * Set bootstrap badge arguments
     *
     * @param array $badge
     */
    public function setBadge(array $badge): void
    {
        $this->badge = $badge;
    }

    /**
     * @return string
     */
    public function getIconClass(): string
    {
        if(is_array($this->iconClasses)) {
            return implode(' ', $this->iconClasses);
        } else {
            return $this->iconClasses;
        }
    }

    /**
     * @param array|string $iconClasses
     */
    public function setIconClasses($iconClasses): void
    {
        $this->iconClasses = $iconClasses;
    }

    /**
     * @return bool
     */
    public function hasIcon()
    {
        return !empty($this->getIconClass());
    }

    /**
     * @return bool
     */
    public function hasBadge()
    {
        return !empty($this->badge());
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function userHasPermission()
    {
        $hasAnyPermission = false;
        foreach ($this->permissions as $permission) {
            $hasAnyPermission = $hasAnyPermission || Gate::allows('permission:' . Str::kebab($permission));
        }
        return Auth::check() &&((!empty($this->permissions) && $hasAnyPermission) || empty($this->permissions));
    }

    /**
     * Valid if both name and slug are not empty
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->getName() && $this->getSlug();
    }

    public function clearTag($text)
    {
        $descclear = "/<(\/?)(script|i?frame|style|html|body|li|i|map|title|img|link|span|u|font|table|tr|b|marquee|td|strong|div|a|meta|\?|\%)([^>]*?)>/isU";
        $text = preg_replace($descclear,"",$text);

        return $text;
    }

    public function editLog(){

    }


}
