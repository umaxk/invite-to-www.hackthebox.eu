<?php
/**
 * if you need to quickly get an invite to hackthebox you can use this script
 * written for fun
 * @link https://www.hackthebox.eu/ 
 * @see https://www.hackthebox.eu/invite/ invite entry page
 * @author umaxk <dev.umaxk@ya.ru>
 */
declare(strict_types=1);

(string)$result = file_get_contents(
    'https://www.hackthebox.eu/api/invite/generate', 
    false, 
    stream_context_create([
        'http' => [
            'method' => 'POST'
        ]
    ])
);

(array)$response = json_decode($result, true);

if ((int)($response['success']??-1) === 1) {
    (string)$code = $response['data']['code']??'圓';
    echo ($code!=='圓')?'Invite code: '.base64_decode($code):'Error invitecode';
}
else {
    echo 'No sucsess';
}

?>