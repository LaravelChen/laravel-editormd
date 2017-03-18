# Editor.md For Laravel5

## 介绍
> 介于在Laravel下使用Editor.md这款Markdown编辑器的原因,觉得这款编辑器非常好用，于是做成laravel的扩展，方便使用!
Editor.md的官网是:https://pandao.github.io/editor.md/examples/index.html
## 效果图
### 默认样式
![image](https://github.com/LaravelChen/laravel-editormd/raw/master/images/default.png)

### sublime样式
![image](https://github.com/LaravelChen/laravel-editormd/raw/master/images/darktwo.png)

## 安装
### 使用composer安装扩展(最好翻墙哈哈)
```
composer require laravelchen/laravel-editormd
```
### 然后在config/app.php添加provider
```
'providers' => [
    LaravelChen\Editormd\EditorMdProvider::class,
   ];
```
### 最后生成配置文件
```
php artisan vendor:publish
```

## 用法
### 配置文件的内容(config/editormd.php)
```
<?php
return [
    'width'=>'100%',//宽度建议100%
    'height'=>'700',//高度
    'theme'=>'default',//顶部的主题分为default和dark
    'editorTheme'=>'default',//显示区域的主题分为default和pastel-on-dark 注:如果想要配置其他主题，请参考vendor/editormd/lib/theme目录下的css文件
    'previewTheme'=>'default',//编辑区域的主题分为default,dark,
    'flowChart' => 'true',  //流程图
    'tex' => 'true',  //开启科学公式TeX语言支持
    'searchReplace'=>'true',//搜索替换
    'saveHTMLToTextarea' => 'true',  //保存 HTML 到 Textarea
    'codeFold' => 'true',  //代码折叠
    'emoji' => 'true',  //emoji表情
    'toc' => 'true',  //目录
    'tocm' => 'true',  //目录下拉菜单
    'taskList' => 'true',  //任务列表
    'imageUpload' => 'true',  //图片本地上传支持
    'sequenceDiagram' => 'true',  //开启时序/序列图支持
];
```
### 例子(请在editor_js()之前引用jquery)
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {!! editor_css() !!}
</head>
<body>
<div class="container">
    <div class="col-md-12" style="margin-top: 50px">
        <div id="editormd_id">
            <textarea name="content" style="display:none;"></textarea>
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
{!! editor_js() !!}
</body>
</html>
```
>OK！一切完成后！尽请使用吧!


