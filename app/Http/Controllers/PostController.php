<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post1 = Post::find(1);
//        dump($post1->title);

        $post2 = Post::find(2);
//        dump($post2->title);

        echo ("<br>");
        echo ("___________________________________");

        $posts = Post::all();

        foreach ($posts as $post) {
            dump($post->title);
            dump($post->content);
        }

        dump($posts);
        echo ("<br>");
        echo ("___________________________________");

//        отобразить всё посты где is_published имеет значение 1
        $posts = Post::where('is_published', 1)->get();
//      $posts = Post::where('is_published', 1)->first(); отобразит первый найденый
        foreach ($posts as $post) {
            dump($post->title);
        }

//        print_r($posts[0]->getAttributes());

//        var_dump([
//            'title' => $posts[0]->title,
//            'content' => $posts[0]->content,
//            'image' => $posts[0]->image,
//            'likes' => $posts[0]->likes
//        ]);

//        return 'this is POST page';
    }


    public function create()
    {
        $postsArr = [
            [
              'title' => 'Title test 1',
              'content' => 'Content test 1',
              'image' => 'imageTest 1',
              'likes' => 11,
              'is_published' => 1,
            ],
            [
                'title' => 'Title test 2',
                'content' => 'Content test 2',
                'image' => 'imageTest 2',
                'likes' => 22,
                'is_published' => 1,
            ],
            [
                'title' => 'Title test 3',
                'content' => 'Content test 3',
                'image' => 'imageTest 3',
                'likes' => 23,
                'is_published' => 1,
            ]
        ];


//        Post::create([
//            'title' => 'Title test 2',
//            'content' => 'Content test 2',
//            'image' => 'imageTest 2',
//            'likes' => 22,
//            'is_published' => 1,
//        ]);

        foreach ($postsArr as $post) {
            Post::create($post);
        }

        /** если отличаются ключи массива от названий колонок в бд
        foreach ($postsArr as &item) {
            Post::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'likes' => $item['likes'],
                'is_published' => $item['is_published'],
         */

        dd('created!!!!');
    }



    /** метод update через который обновляем существующие данные из бд **/

    public function update()
    {
        $post = Post::find(15);

//        dd($posts->title);

        $post->update([
            'title' => 'update 1',
            'content' => 'update 1',
            'image' => 'update 1',
            'likes' => 1000,
            'is_published' => 0,
        ]);
        dd('updated');
    }



    /** удаление данных с бд
 * плохая практика
 * нужно добавлять use SoftDeletes; в модели (Models/Post.php)
 * и добавить в миграцию $table->softDeletes();
    public function delete()
    {
        $post = post::find(15);
        $post->delete();

        dd('delete');
    }
 **/

    public function delete()
    {
        $post = post::find(6);
        $post->delete();

        dd('delete');
    }

    public function backToBD()
    {
        $post = post::withTrashed()->find(6);
        $post->restore();

        dd('backToBD');
    }

    // fistOrCreate
    // updateOrCreate

    public function fistOrCreate()
    {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image',
            'likes' => 50000,
            'is_published' => 1,
        ];

        // Используем firstOrCreate для поиска записи с title = 'some post'.
        // Если запись не найдена, создаётся новая запись с указанными атрибутами.
        // Если запись найдена, она возвращается без создания новой.
        $post = Post::firstOrCreate(
            [
                // Условие для поиска: ищем пост с таким заголовком
                'title' => 'some title',
            ],
            [
                // Если пост не найден, создаём новый пост с этими данными
                'title' => 'some title',
                'content' => 'some content',
                'image' => 'some image',
                'likes' => 50000,
                'is_published' => 1,
            ]
        );

        // Выводим содержимое (content) найденного или созданного поста
        dump($post->content);

        // Остановка скрипта с сообщением 'finished'
        dd('finished');

    }


    public function updateOrCreate()
    {
        // Массив данных для потенциального создания нового поста
        $anotherPost = [
            'title' => 'updateOrCreate some post',
            'content' => 'updateOrCreate some content',
            'image' => 'updateOrCreate some image',
            'likes' => 500,
            'is_published' => 1,
        ];

        // Используем метод updateOrCreate для обновления существующей записи
        // или создания новой, если такая запись не найдена
        $post = Post::updateOrCreate(
            [
                // Условие для поиска поста: ищем пост с указанным заголовком
                'title' => 'some title phpstorm',
            ],
            [
                // Если пост не найден, создаём новый с этими атрибутами
                // Если пост найден, обновляем его этими данными
                'title' => 'some title phpstorm', // Обязательно должно совпадать с условием поиска
                'content' => 'updateOrCreate some content',
                'image' => 'updateOrCreate some image',
                'likes' => 500,
                'is_published' => 1,
            ]
        );

        // Выводим контент (содержимое) найденного или обновленного поста
        dump($post->content);

        // Останавливаем выполнение кода и выводим сообщение 'finished'
        dd('finished');
    }

}
