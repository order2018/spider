<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {

        $content = strip_tags(htmlspecialchars_decode($article->content));

        //dd($this->gPic_Url($article->content));

        /*$preg = "/<img.*?src=[\"|\'](.*?)[\"|\'].*?>/";
        $replace = '<img src="$1">';

        $content = preg_replace($preg, $replace, $article->content);*/

        return view('article.show',compact('article','content'));
    }

    //提取URL
    public function gFile_Url($content){
        preg_match_all("'<\s*a\s.*?href\s*=\s*([\"\'])?(?(1)(.*?)\\1|([^\s\>]+))[^>]*>?(.*?)</a>'isx",$content,$links);
        while(list($key,$val) = each($links[2])) {
            if(!empty($val))
                $match[] = $val;
        }
        while(list($key,$val) = each($links[3])) {
            if(!empty($val))
                $match[] = $val;
        }
        return $match;
    }
    //提取图片
    public function gPic_Url($content){
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";//正则
        preg_match_all($pattern,$content,$match);//匹配图片
        return $match[1];//返回所有图片的路径
    }
}
