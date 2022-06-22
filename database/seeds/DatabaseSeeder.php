<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        /*\DB::table('countries')->insert([
            [
                'name' => '日本',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'アメリカ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'イギリス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'フランス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ドイツ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'スペイン',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'カナダ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '韓国',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '香港',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '中国',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'インド',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
        
        DB::table('genres')->insert([
            [
                'tmdb_id' => 28,
                'name' => 'アクション',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 18,
                'name' => 'ドラマ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 878,
                'name' => 'SF',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 14,
                'name' => 'ファンタジー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 12,
                'name' => 'アドベンチャー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 80,
                'name' => 'サスペンス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 9648,
                'name' => 'ミステリー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 27,
                'name' => 'ホラー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 53,
                'name' => 'スリラー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 10749,
                'name' => 'ロマンス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 16,
                'name' => 'アニメ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 10751,
                'name' => 'ファミリー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 35,
                'name' => 'コメディ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 99,
                'name' => 'ドキュメンタリー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 10752,
                'name' => '戦争',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 36,
                'name' => '史劇',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 37,
                'name' => '西部劇',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 10402,
                'name' => '音楽',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tmdb_id' => 10770,
                'name' => 'テレビ映画',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            /*
            [
                'name' => 'キッズ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '特撮',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '青春',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '時代劇',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ミュージカル',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);*/
        
        /*\DB::table('ages')->insert([
            [
                'name' => '10代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '20代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '30代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '40代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '50代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '60代',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
        
        \DB::table('genders')->insert([
            [
                'name' => '男性',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '女性',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '回答しない',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);*/
        
        /*\DB::table('scores')->insert([
            [
                'name' => '1点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '2点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '3点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '4点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '5点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '6点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '7点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '8点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '9点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '10点',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
        
        \DB::table('feelings')->insert([
            [
                'name' => '感動したい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '元気を出したい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ワクワクしたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '癒されたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'やる気を出したい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'キュンキュンしたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ひやひや/ゾクゾクしたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'スカッとしたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '笑いたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);*/
    }
}
