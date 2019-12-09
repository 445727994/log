<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model {
	protected $table = 'users';
	use Notifiable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'mobile', 'wx_openid', 'wx_nickname', 'wx_head_img',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	//定义普通字段
	const FIELD = [
		'id' => ['sort' => true, 'name' => '用户序号', 'quickSearch' => 'equal'],
		'name' => ['name' => '姓名', 'type' => 'text', 'quickSearch' => 'like'],
		'mobile' => ['name' => '手机', 'type' => 'mobile', 'quickSearch' => 'like'],
		'email' => ['name' => '邮箱', 'type' => 'email', 'quickSearch' => 'like'],
		'wx_nickname' => ['name' => '微信昵称', 'type' => 'text'],
		'wx_head_img' => ['name' => '微信头像', 'type' => 'text'],
		'created_at' => ['sort' => true, 'name' => '创建时间'],
		'updated_at' => ['sort' => true, 'name' => '创建时间'],
	];
	const PAGE = 20;
	const SEARCH = ['name', 'id', 'email', 'mobile', 'wx_nickname'];
	//关联用户select
	public static function selectOption($where = []) {
		return User::where($where)->pluck('name', 'id')->toArray();
	}
}
