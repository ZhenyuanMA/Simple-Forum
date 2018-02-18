<?php

use Illuminate\Database\Seeder;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        factory(App\User::class, 5)->create();

        DB::table('forums')->truncate();
        DB::table('forums')->insert([
            ['name' => '贴吧1',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['name' => '贴吧2',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);

        DB::table('threads')->truncate();
        DB::table('threads')->insert([
            ['title' => '第一个贴子',
            'forum_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['title' => '第二个贴子',
                'forum_id' => 1,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['title' => '第三个贴子',
                'forum_id' => 2,
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


        DB::table('posts')->truncate();
        DB::table('posts')->insert([
            ['content' => '第一个贴子的第一个回复',
            'thread_id' => 1,
            'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第一个贴子的第二个回复',
                'thread_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第一个贴子的第三个回复',
                'thread_id' => 1,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第二个贴子的第一个回复',
            'thread_id' => 2,
            'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第二个贴子的第二个回复',
                'thread_id' => 2,
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第二个贴子的第三个回复',
                'thread_id' => 2,
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第三个贴子的第一个回复',
                'thread_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第三个贴子的第二个回复',
                'thread_id' => 3,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['content' => '第三个贴子的第三个回复',
                'thread_id' => 3,
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        DB::table('forum_users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
