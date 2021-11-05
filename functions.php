<?php

// Функция для шаблонизации

function include_template($name, array $data = [])
{
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
//Функция для обрезки текста

function cut_text($string, $max_length = 300)
{
    $words = explode(' ', $string);
    $length = 0;
    $link = '<a class="post-text__more-link" href="#">Читать далее</a>';
//Считает кол-во символов
    $final_length = mb_strlen($string);
// Если кол-во больше 300, то обрезает текст
    if ($final_length > $max_length) {
        $final_length = 0;

        foreach ($words as $word) {
            $length = $final_length + mb_strlen($word);
            if ($length >= $max_length) {
                break;
            }
            $final_length = $length + 1;
            $result[]= $word;
        }

        $new_text = '<p>' . implode(' ', $result) . '...' . '</p>' . $link;
    }
    // Если меньше 300, то возвращет исходный текст
    else {
        $new_text = '<p>' . $string . '</p>';
    }

    return $new_text;
}

//Возвращает код iframe для вставки youtube видео на страницу

function embed_youtube_video($youtube_url)
{
    $res = "";
    $id = extract_youtube_id($youtube_url);

    if ($id) {
        $src = "https://www.youtube.com/embed/" . $id;
        $res = '<iframe width="760" height="400" src="' . $src . '" frameborder="0"></iframe>';
    }

    return $res;
}
