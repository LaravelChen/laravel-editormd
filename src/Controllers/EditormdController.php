<?php

namespace LaravelChen\Editormd\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;

class EditormdController extends Controller
{
    //上传图片的处理
    public function uploadimage(Request $request)
    {
        //这是根据官网上面上传图片的json返回数据的固定格式
        //http://www.ipandao.com/editor.md/examples/image-upload.html网址在这里
        $json = [
            'success' => 0,
            'message' => '',
            'url' => '',
        ];
        if ($request->hasFile('editormd-image-file')) {
            $file = $request->file('editormd-image-file');
            $max = [
                'editormd-image-file' => 'max:10240',
            ];
            $message = [
                'editormd-image-file.max' => '上传图片最大不超过10M',
            ];
            $validator = Validator::make($request->all(), $max, $message);
            if ($validator->passes()) {
                $destpath = 'uploads/images/';
                $savepath = $destpath . date('Ymd', time());
                if (!is_dir($savepath)) {
                    mkdir($savepath,0777,true);
                }
                $ext = $file->getClientOriginalExtension();
                if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])) {
                    $realpayh = '/' . $savepath . '/' . uniqid() . '_' . date('s') . '.' . $ext;
                    if ($file->isValid()) {
                        $file->move($savepath, $realpayh);
                        $json = array_replace($json, ['success' => 1, 'url' => $realpayh]);
                    } else {
                        $json = array_replace($json, ['success' => 0, 'meassge' => '文件校验失败']);
                    }
                } else {
                    $json = array_replace($json, ['success' => 0, 'meassge' => '文件类型不符合要求']);
                }
            } else {
                $json = array_replace($json, ['success' => 0, 'meassge' => $validator->messages()]);
            }
            return response()->json($json);
        }
    }
}
