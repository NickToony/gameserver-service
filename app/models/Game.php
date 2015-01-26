<?php

class Game extends Eloquent {
    public function server() {
        return $this->hasMany('Server', 'game_id');
    }

    public function statistic() {
        return $this->hasMany('Statistic', 'game_id');
    }
}