<?php

namespace core;

class Cache {
    use TSingleton;

    public function set($key, $data, $seconds = 3600): bool {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        $file = CACHE . '/' . $key . '.txt';

        if (file_put_contents($file, serialize($content))) {
            return true;
        } else {
            return false;
        }
    }

    public function get($key) {
        $file = CACHE . '/' . $key . '.txt';

        if (file_exists($file)) {
            $content = file_get_contents($file);
            $content = unserialize($content);

            if (time() <= $content['end_time']) {
                return $content['data'];
            }

            unlink($file);
        }

        return false;
    }    

    public function delete($key) {
        $file = CACHE . '/' . $key . '.txt';

        if (file_exists($file)) {
            unlink($file);
        }
    }
}