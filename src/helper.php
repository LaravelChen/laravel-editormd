<?php

if (!function_exists("editor_css")) {
    function editor_css()
    {
        return '
           <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.css"/>
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.preview.css">
           <link rel="stylesheet" href="/vendor/editormd/css/customer.css">
        ';
    }
}

if (!function_exists("editor_js")) {
    function editor_js()
    {
        return '
<script src="/vendor/editormd/js/editormd.js"></script>
<script src="/vendor/editormd/lib/marked.min.js"></script>
<script src="/vendor/editormd/lib/prettify.min.js"></script>
<script src="/vendor/editormd/lib/raphael.min.js"></script>
<script src="/vendor/editormd/lib/underscore.min.js"></script>
<script src="/vendor/editormd/lib/sequence-diagram.min.js"></script>
<script src="/vendor/editormd/lib/flowchart.min.js"></script>
<script src="/vendor/editormd/lib/jquery.flowchart.min.js"></script>
<script>
    var testEditor;
    $(function () {
        editormd.emoji = {
            path: "//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/",
            ext: ".png"
        };
        testEditor = editormd({
            id: "editormd_id",
            width: "' . config('editormd.width') . '",
            height:' . config('editormd.height') . ',
            theme: "' . config('editormd.theme') . '",
            editorTheme:"' . config('editormd.editorTheme') . '",
            previewTheme:"' . config('editormd.previewTheme') . '",
            path: \'/vendor/editormd/lib/\',
            codeFold:' . config('editormd.codeFold') . ',
            saveHTMLToTextarea: ' . config('editormd.saveHTMLToTextarea') . ',
            searchReplace: ' . config('editormd.searchReplace') . ',
            emoji: ' . config('editormd.emoji') . ',
            taskList: ' . config('editormd.taskList') . ',
            tocm: ' . config('editormd.tocm') . ',
            tex: ' . config('editormd.tex') . ',
            flowChart: ' . config('editormd.flowChart') . ',
            sequenceDiagram: ' . config('editormd.sequenceDiagram') . ',
            imageUpload: ' . config("editormd.imageUpload") . ',
            imageFormats:["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL: "/larvelchen/upload/editormd/image?token=' . csrf_token() .'",
        });
    })
</script>
    ';
    }
}