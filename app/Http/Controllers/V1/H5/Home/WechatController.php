<?php

namespace App\Http\Controllers\V1\H5\Home;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
class WechatController extends Controller
{
    protected $user;
    public function auth(){
    //由于使用了easyWechat中 中间件的方法进行授权，因此一句话搞定直接获取授权用户的信息如下：


    }
    public function buy(Request $request){
        if(empty(session('wechat_user'))){
            $oauth = $this->app->oauth;
            session(['target_url'=>'/buy']);
            return $oauth->redirect();
        }
        $user = session('wechat_user');
        //dd($user);
        $skd = $this->app->jssdk->buildConfig(['updateAppMessageShareData', 'updateTimelineShareData'],$debug = false, $beta = false, $json = true);
        $url = "box.7wh.com/buy";
        $this->app->jssdk->setUrl($url);
        return view('share',compact('skd','user'));
    }

}
