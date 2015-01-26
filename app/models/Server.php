<?php

class Server extends Eloquent {

    public function getMetaAttribute($value) {
        return json_decode($value);
    }

    public function setMetaAttribute($value) {
        $this->attributes['meta'] = json_encode($value);
    }

}