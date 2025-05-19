<?php

namespace App\Models;


class Post
{
    private static $akun_post = [
        
            [
                'username' => 'Bimantara Prakasa Jatnika',
                'slug' => 'bimantara-prakasa-jatnika',
                'password' => 'administrator',
                'email' => 'bimantara.nelitas@gmail.com'
            ],
            [
                'username' => 'Aditya Ihsan Maulana',
                'slug'=> 'aditya-ihsan-maulana',
                'password' => 'user',
                'email' => 'adit.cigalontang@gmail.com'
            ]
            ];

    public static function all()
    {
        return collect(self::$akun_post);
    }

    public static function find($slug)
    {
        $post = static::all();    
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $post->firstWhere('slug', $slug);
    }
}
