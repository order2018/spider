<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {

        $content = strip_tags(htmlspecialchars_decode($article->content));

        $imgs = $this->gPic_Url($article->content);

        return view('article.show',compact('article','content','imgs'));
    }

    //提取图片
    public function gPic_Url($content){
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";//正则
        preg_match_all($pattern,$content,$match);//匹配图片
        return $match[1];//返回所有图片的路径
    }
}
