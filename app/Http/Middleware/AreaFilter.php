<?php

namespace App\Http\Middleware;

use Closure;

class AreaFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //通过session里user的地区进行判断资源
        //如果是资源表内字段没有对应的地区，或者资源并非属于单一地区，需在资源其他表内含有判断的字段。
        //比如可以通过审核人员所在的地区判断。那么思路就应该是这样的：
        //搜索和该用户同样区域的审核人员的id的集合，并赋予请求属性，传入到控制器进行条件判断。
        //所有需要此权限的控制器均要使用该中间件。
        $request->area = 1;
        return $next($request);
    }
}
