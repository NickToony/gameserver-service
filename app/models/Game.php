<?php

class Game extends Eloquent {
    public function server() {
        return $this->hasMany('Server', 'game_id');
    }
}