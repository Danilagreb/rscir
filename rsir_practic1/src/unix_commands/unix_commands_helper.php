<?php
function get_result($command){
    $result = match ($command) {
        'ls', 'ps', 'whoami', 'id', 'pwd' => exec($command),
        default => throw new Exception('Bad operation')
    };
    return $result;
}