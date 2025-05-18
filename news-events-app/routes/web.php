<?php

use App\Models\News;
use App\Events\NewsHidden;

Route::get('/news/create-test', function () {
    $news = new News();
    $news->title = 'Test news title';
    $news->body = 'Test news body';
    $news->save();

    return 'News created with id ' . $news->id;
});

Route::get('/news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->hidden = true;
    $news->save();

    NewsHidden::dispatch($news);

    return 'News ' . $news->id . ' hidden';
});
