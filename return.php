<?php

function getPosts()
{
    $json = file_get_contents('api.json');

    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($json, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $posts = array();

    foreach ($jsonIterator as $key => $val) {
        if (is_array($val)) {
            if ($key === 'l') { // "l" => posts
                $posts = $val;
            }
            if ($key === 'bd') { // "bd" => category arrays d1-d16
                $categories = $val;
            }
            if ($key === 'bm') { // "bm" => titles and category strings m1-m74
                $titles = $val;
            }
            if ($key === 'br') { // "br" => images u, r1-r16
                $images = $val;
            }
            if ($key === 'ba') { // "ba" => mrf pairs - mrf[x][y0] = a
                $pairs = $val;
            }
            if ($key === 'bl') { // "bl" => tags - u, l1-l8
                $tags = $val;
            }
        }
    }

    $updated_posts = array();

    foreach ($posts as $post) {
        foreach ($images as $key => $value) {
            if ($post['r'] === $key) { // add images to posts "r" => "r1"-"r16"
                $post['r'] = $value;
            }
        }

        foreach ($categories as $key => $value) { // add category arrays to posts "d" => "d1"-"d16"
            if ($post['d'] === $key) {
                $post['d'] = $value;
            }
        }

        foreach ($titles as $key => $value) {
            if ($post['mr'] === $key) {
                $post['mr'] = $value;
            }
        }

        for ($i = 1; $i < 5; $i++) {
            foreach ($titles as $key => $value) {
                if ($key === $post['d'][$i]['v']) {
                    $post['d'][$i]['v'] = $value;
                }
            }
            foreach ($tags as $key => $value) {
                if ($key === $post['d'][$i]['l']) {
                    $post['d'][$i]['l'] = $value;
                }
            }
        }
        /* echo json_encode($post); */

        array_push($updated_posts, $post);
    }

    return $updated_posts;
}
