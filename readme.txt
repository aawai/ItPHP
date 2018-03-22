Itphp 框架说明

一级
	APP应用模块
	ItPHP 框架
	Public 公共文件存储
	index.php 入口文件
	.htaccess URL重写模式

二级
	App应用模块（单站点）
		Controller 层
		Model 层
		View  文件
		Runtime 缓存 日志（始终App层下）
		Common 多站点公用配置 及函数（App下 及站点下均有）
		config 多站点公用配置 及函数（可加入Common）
		可配置多站点、只需要在config文件数组中加入 MOUDLE=>'Your Website Name'，
		并在App中建立相应文件夹 即可
		其他站点复制第一个站点更改相应名称即好
	
	
	ItPHP 框架
		Common 基本函数库 404页面
		Library 基本类库	
		ItPHP 预处理


	Public 公共文件
		用于存储模块前端ji css 图片等文件
	
	Upload 上传文件


详细 

	Library
		Controller 控制类父类
		ItCore 核心类处理
		Log 日志类
		Model 数据模型类
		Route 路由类		