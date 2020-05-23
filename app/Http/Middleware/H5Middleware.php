<?php

namespace App\Http\Middleware;

use App\Models\Auth\User;
use Closure;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class H5Middleware
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
        //进行登录
        $wechat = session('wechat.oauth_user.default');
        //查询用户
        $user=auth('h5wechat')->user();
        if(!$user){
            $has = User::query()->where('wx_openid', $wechat->id)->first();
            //校验用户是否存在，不存在则创建新用户
            if(!$has){
                //获取用户信息
                $config = config('wechat.official_account.default');
                $app = Factory::officialAccount($config);
                $userInfo =$app->user->get($wechat->id);
                $userInfo['nickname']=base64_encode($userInfo['nickname']);
                //->user->get($wechat->id);
                $result = User::create([
                    'name' => $userInfo['nickname'],
                    'wx_nickname' => $userInfo['nickname'],
                    'password' => Hash::make('123456'),
                    'wx_openid' => $wechat->id,
                    'login_ip' => $request->getClientIp(),
                ]);
            }else{
                $result = $has;
            }
            auth('h5wechat')->login($result);
        }
        //认证登陆
        //获取跳转地址
 //       $redirect_url = $request->redirect_url;
//        var_dump( $redirect_url );exit;
//        if($redirect_url == ''){
//            //如果跳转地址不存在
//
//            return redirect('home/index');
//        }else{
//            return redirect($redirect_url);
//        }

        return $next($request);
    }
}
